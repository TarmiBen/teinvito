<?php

namespace App\Http\Controllers;

use App\Models\guests;
use App\Models\Invitation;
use App\Models\User;
use App\Notifications\ConfirmacionAsistencia;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;


class GuestsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guests = guests::all();
        return view('guests.index', compact('guests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = auth()->user()->id;
        $userName = auth()->user()->name;
        $users = User::all();
        return view('guests.create',compact('userId','users','userName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $guest = new guests();
        do {
            $guest->hash = Str::random(13);
        } while (guests::where('hash', $guest->hash)->exists());
        $guest->invitation_id = Invitation::where('users_id', auth()->id())->latest()->first()->id;
        $guest->name = $request->name;
        $guest->lastname = $request->lastname;
        $guest->phone = $request->phone;
        $guest->email = $request->email;
        $userInvited = $request->email;
        $guest->number = guests::where('invitation_id', $guest->invitation_id)->count() + 1;
        $guest->status = 3;
        $guest->save();

        $guest = guests::latest()->first();
        $hash = $guest->hash;
        $url = URL::temporarySignedRoute('guests.confirm',
            now()->addMinutes(5), [ 'hash' => $hash]);

        $notification = new ConfirmacionAsistencia($url);
        \Notification::route('mail', $userInvited)->notify($notification);

        return redirect()->route('guests.index')->with('message','Invitado creado correctamente');
    }

    public function confirmAssistance(Request $request,  $hash)
    {
        $guests = guests::where('hash', $hash)->latest()->first();
        $response = $request->input('request');
        $guests->status = $response;
        $guests->update();
        return redirect()->route('guests.index')->with('message', ' Estatus Invitado confirmado correctamente');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(guests $guests)
    {
        $guests->delete();
        return redirect()->route('guests.index')
        ->with('message', 'Contact deleted successfully. <a href="' . route('.restore', $guests->id) . '">Restore</a>');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        guests::withTrashed()->where('id', $id)->restore();
        return redirect()->route('guests.index')
            ->with('message', 'Contact restored successfully');
    }

    public function urlValid(Request $request, $hash)
    {
        if (!$request->hasValidSignature( )) {
            abort(403, 'La URL no es válida o ha expirado el tiempo de confirmación');
        }
        $guests = guests::where('hash', $hash)->first();
        return view('guests.response', compact('guests'));
    }


}
