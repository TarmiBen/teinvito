<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
            'user_id' => 'required',
            'invitation_id' => 'required',
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
        $event->users_id = $request->user_id;
        $event->user_invited_id = $request->user_invited_id;
        $userInvited = $request->user_invited_id;
        $event->invitation_id = $request->invitation_id;
        if ($request->type1 == null && $request->type != null) {
            $event->type = $request->type;
        }elseif ($request->type == 'new' && $request->type1 != null) {
            $event->type = $request->type1;
        }
        $event->ceremony_date = $request->ceremony_date;
        $event->event_date = $request->event_date;
        $event->title = $request->title;
        $user = User::find($userInvited);

        $user->notify(new UserInvitedId());

        $event->save();

        return view('admin.invitations.index')->with('message', 'Event created successfully');
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
        return view('event.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validator = Validator::make($request->all(), [
            'invitation_id' => 'required',
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
        $event->invitation_id = $request->invitation_id;
        $event->type = $request->type;
        $event->ceremony_date = $request->ceremony_date;
        $event->event_date = $request->event_date;
        $event->title = $request->title;
        $event->update();

        return redirect()->route('event.index')->with('message', 'Event updated successfully');
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
