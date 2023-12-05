<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Invitation;
use App\Models\User;
use App\Notifications\UserInvitedId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();

        return view('event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = auth()->user()->id;
        $userName = auth()->user()->name;
        $users = User::all();
        return view('event.create',compact('userId','users','userName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $today = now();
        $nextDay = $today->addDay();
        $validator = Validator::make($request->all(), [
            'user_invited_id' => 'required|email',
            'type' => 'required',
            'ceremony_date' => "required|date|after_or_equal:$nextDay",
            'event_date' => "required|date|after_or_equal:$nextDay",
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            Log::channel('controller')->info('El usuario con id:' . auth()->user()->id . ' intentó crear un evento pero fallo en el dato: ' . $validator->errors()->first());

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $event = new Event();
        $user = Auth::user();
        $event->users_id = $user->id;
        $event->user_invited_id = $request->user_invited_id;
        $userInvited = $request->user_invited_id;
        $event->invitation_id = Invitation::where('user_id', $user->id)->latest()->first()->id;
        if ($request->type == 'new') {
            $event->type = $request->type2;
        }else {
            $event->type = $request->type;
        }
        $event->ceremony_date = $request->ceremony_date;
        $event->event_date = $request->event_date;
        $event->title = $request->title;
        $user = $userInvited;
        Notification::route('mail', $user)
            ->notify(new UserInvitedId());




        $event->save();

        return redirect()->route('event.index')->with('message', 'Evento creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        return view('event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $users = User::all();
        return view('event.edit',compact('event','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validator = Validator::make($request->all(), [
            'user_invited_id' => 'required|email',
            'type' => 'required',
            'ceremony_date' => 'required',
            'event_date' => 'required',
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            Log::channel('controller')->info('El usuario con id:' . auth()->user()->id . ' intentó actualizar un evento pero fallo en el dato: ' . $validator->errors()->first());

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $event->user_invited_id = $request->user_invited_id;
        $userInvited = $request->user_invited_id;
        if ($request->type == 'new') {
            $event->type = $request->type2;
        }else {
            $event->type = $request->type;
        }
        $event->ceremony_date = $request->ceremony_date;
        $event->event_date = $request->event_date;
        $event->title = $request->title;
        $user = $userInvited;
        Notification::route('mail', $user)
            ->notify(new UserInvitedId());
        $event->update();

        return redirect()->route('event.index')->with('message', 'Evento actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event = Event::find($event->id);
        $event->delete();
        return redirect()->route('event.index')->with('message', 'Event deleted successfully <a href="'.route('event.restore', $event->id).'">Restore</a>');

    }

    public function restore($id)
    {
        Event::onlyTrashed()->find($id)->restore();

        return redirect()->back()->with('message', 'Event restored successfully');
    }
}
