<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PasswordController extends Controller
{
    // Mostrar el formulario de solicitud de correo para restablecer la contraseña
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');  // Vista personalizada para ingresar el correo
    }

    // Enviar el enlace de restablecimiento de contraseña al correo
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', trans($status))
                    : back()->withErrors(['email' => trans($status)]);
    }

    // Mostrar el formulario de restablecimiento de la contraseña
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset', ['token' => $token, 'email' => $request->email]);  // Vista personalizada para restablecer la contraseña
    }

    // Procesar el restablecimiento de la contraseña
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                ])->save();
            }
        );

        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', trans($status))
                    : back()->withErrors(['email' => [trans($status)]]);
    }
}
