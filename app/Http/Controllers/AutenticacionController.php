<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;


class AutenticacionController extends Controller
{
    public function formularioLogin()
    {
        return view('autenticacion.formulario-login');
    }
    public function formularioRegistro()
    {
        return view('autenticacion.formulario-registro');
    }

    public function procesoLogin(Request $request)
    {

        $credentials = $request->only(['email', 'password']);

        if (!auth()->attempt($credentials)) {
            return redirect()
                ->route('autenticacion.formularioLogin')
                ->with('feedback.message', 'Las credenciales ingresadas no coinciden con nuestros registros.')
                ->with('feedback.type', 'danger')
                ->withInput();

            $request->session()->regenerate();

            return redirect()
                ->route('articulos.index')
                ->with('feedback.message', 'Sesión iniciada con éxito.');
        } else {
            if (auth()->user()->rol_id == '1') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->to('/');
            }
        }
    }

    public function procesoLogout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('autenticacion.formularioLogin')
            ->with('feedback.message', 'La sesión se cerró con éxito.');
    }

    public function procesoRegistro(Request $request)
    {
         $request->validate(User::validationRules(), User::validationMessages());
    
            $user = User::create([
                'email'=> $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

    
            auth()->login($user);
            return redirect()->to('/');
        
}

public function mostrarPerfil()
{
    return view('autenticacion.perfil');
}

public function actualizarContrasena(Request $request)
{

    $request->validate(User::validationRules(), User::validationMessages());

    $user = User::find(Auth::user()->id);
    $user->password = Hash::make($request["password"]);
    $user->update();

    return redirect()->route('autenticacion.mostrarPerfil')
        ->with('feedback.message', 'Contraseña actualizada con éxito.');
}



}

