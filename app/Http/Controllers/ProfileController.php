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

        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->lastname = $request->lastname;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Perfil actualizado con éxito');
    }
}
