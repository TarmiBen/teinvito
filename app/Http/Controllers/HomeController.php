<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Invitation;
use App\Models\Event;
use App\Models\events_invitations;
use App\Models\guests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $invitations        = $this->invitations();
        $guests             = $this->guests();
        $lastEventDate      = $this->getLastEventDate();
        $lastInvitation     = $this->show();
        return view('home', compact('guests', 'invitations', 'lastEventDate', 'lastInvitation'));
    }

    public function invitations()
    {
        $user = Auth::user()->id;

        $invitations['invitationsCount'] = Invitation::whereIn('users_id', function ($query) use ($user) {
            $query->select('users_id')
                ->from('users')
                ->where('users_id', $user);
        })->count();

        // Obtén solo el nombre del usuario
        $invitations['userName'] = Invitation::whereIn('users_id', function ($query) use ($user) {
            $query->select('users_id')
                ->from('users')
                ->where('users_id', $user);
        })->join('users', 'users.id', '=', 'invitations.users_id') // Asegúrate de ajustar los nombres de las tablas y las columnas según tu base de datos
            ->value('users.name');

        return $invitations;

    }

    public function guests()
    {
        $user = Auth::user()->id;

        // Obtener la última invitación del usuario logeado
        $latestInvitation = Invitation::where('users_id', $user)
            ->latest()
            ->first();

        // Inicializar el array de resultados
        $guests = [
            'accepted' => 0,
            'pending' => 0,
            'rejected' => 0,
            'all' => 0,
        ];

        // Verificar si hay una última invitación
        if ($latestInvitation) {
            // Obtener los invitados asociados a la última invitación
            $guests['accepted'] = guests::where('status', '1')
                ->where('invitation_id', $latestInvitation->id)
                ->count();

            $guests['pending'] = guests::where('status', '2')
                ->where('invitation_id', $latestInvitation->id)
                ->count();

            $guests['rejected'] = guests::where('status', '3')
                ->where('invitation_id', $latestInvitation->id)
                ->count();
        }

        // Obtener todos los invitados
        $guests['all'] = guests::count();

        return $guests;
    }

    public function getLastEventDate()
    {
        $user = Auth::user();

        // Obtén el último evento del usuario logeado
        $lastEvent = Event::where('users_id', $user->id)
            ->latest('event_date')
            ->first();

        if ($lastEvent) {
            // Parsea la fecha utilizando Carbon y formatea según tus necesidades
            $lastEventDate = Carbon::parse($lastEvent->event_date)->format('Y-m-d');
            return $lastEventDate;
        } else {
            return "No hay eventos registrados.";
        }
    }

    public function show()
    {
        // Obtener el ID del usuario 
        $userId = Auth::user()->id;

        // Obtener la última invitación creada por el usuario
        $lastInvitation = Invitation::where('users_id', $userId)
            ->orderBy('created_at', 'desc')
            ->first();
        
        return $lastInvitation;
    }

}
