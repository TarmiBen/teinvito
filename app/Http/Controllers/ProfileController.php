<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('users.profile.index');
    }

    public function edit($id)
    {
        return view('users.profile.edit');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name=$request->name;
        $user->save();
        return redirect()->route('profile.index');
    }
}
