<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\guests;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $invitations = Invitation::where('user_id', $user->id)->get();
        $events = Event::where('users_id', $user->id)->get();
        if ($invitations->isNotEmpty()) {
            $firstInvitationId = $invitations->first()->id;
            $guests = guests::where('invitation_id', $firstInvitationId)->get();
        } else {
            $guests = collect();
        }


        return view('admin.user.show', compact('user', 'events', 'invitations', 'guests'));
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
    public function destroy(string $id)
    {
        //
    }
}
