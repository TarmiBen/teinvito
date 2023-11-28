<?php

namespace App\Http\Controllers;

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
        if (empty($user->name) || empty($user->lastname) || empty($user->phone) || empty($user->email)) {
            $editProfileLink = '<a href="'.route('profile.edit', $user->id).'">Editar perfil</a>';
            $message = 'Falta por completar algunos datos de tu perfil. '.$editProfileLink;
    
            session()->put('warning', $message);
        }else{
            session()->forget('warning');
        }
        return view('home');
    }
    
}
