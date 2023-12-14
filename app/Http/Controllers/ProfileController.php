<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

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

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            Log::channel('controller')->info('El usuario con id:' . auth()->user()->id . ' intentó actualizar su perfil pero fallo en el dato: ' . $validator->errors()->first());
    
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Perfil actualizado con éxito');
    }

    public function indexAdmin()
    {
        return view('admin.profile.index');
    }

    public function editAdmin($id)
    {
        return view('admin.profile.edit');
    }

    public function updateAdmin(Request $request, $id)
    {
        $admin = Admin::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            Log::channel('controller')->info('El usuario con id:' . auth()->guard('adminlogin')->user()->id . ' intentó actualizar su perfil pero fallo en el dato: ' . $validator->errors()->first());
    
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->password) {
            $admin->password = bcrypt($request->password);
        }

        $admin->save();

        return redirect()->route('admin.profile.index')->with('success', 'Perfil actualizado con éxito');
    }
}
