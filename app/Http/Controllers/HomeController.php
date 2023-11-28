<?php

namespace App\Http\Controllers;

use App\Models\guests;
use App\Models\Invitation;
use Illuminate\Http\Request;

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
        $user = auth()->user();
        $guests = guests::whereHas('Invitation', function ($query) use ($user) {
            $query->where('users_id', $user->id);
        })->orderBy('status', 'asc')->take(10)->get();

        return view('home', compact('guests'));
    }
}
