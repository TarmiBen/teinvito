<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    //
    
    public function showRegisterForm()
    {
        return view('auth.admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|string|email|max:255|unique:admin',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    
        // Agregar alerta de éxito
        return redirect()->route('admin.login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión con tu nueva cuenta.');
    }

    public function showLoginForm()
    {
        return view('auth.admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (auth()->guard('adminlogin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard')->with('success', '¡Bienvenido!');
        }
    
        return redirect()->back()->with('error', 'Error en las credenciales. Por favor, inténtalo de nuevo.');
    }

    public function showResetPasswordForm()
    {
        return view('auth.admin.resetPassword');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $admin = Admin::where('email', $request->email)->first();
    
        if ($admin) {
            $admin->password = bcrypt($request->password);
            $admin->save();
    
            // Agregar alerta de éxito
            return redirect()->route('admin.login')->with('success', 'Contraseña restablecida con éxito. Puedes iniciar sesión con tu nueva contraseña.');
        }
    
        // Agregar alerta de error
        return redirect()->route('admin.resetPassword')->with('error', 'No se encontró un administrador con esa dirección de correo electrónico. Por favor, verifica tu correo electrónico e inténtalo de nuevo.');
    }

}

