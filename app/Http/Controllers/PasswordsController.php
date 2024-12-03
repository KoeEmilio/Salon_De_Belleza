<?php

namespace App\Http\Controllers;

use App\Mail\RecuperarPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\ResetPasswordMail;

class PasswordsController extends Controller
{

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }


    
    public function sendSignedResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return back()->withErrors(['email' => 'No se encontró un usuario con ese correo.']);
        }
    
        $signedUrl = URL::temporarySignedRoute(
            'custom.password.reset', 
            Carbon::now()->addMinutes(30), 
            ['user' => $user->id]
        );
    
        // Enviar el correo con el enlace firmado
        Mail::to($request->email)->send(new RecuperarPasswordMail($signedUrl));
    
        return back()->with('status', 'Enlace de restablecimiento enviado a tu correo.');
    }

    public function showSignedResetForm(Request $request, $user)
    {
        $user = User::findOrFail($user);

        if (!$request->hasValidSignature()) {
            abort(403, 'Enlace inválido o expirado.');
        }

        return view('auth.reset-password', ['user' => $user]);
    }

    public function resetPassword(Request $request)
{

    $request->validate([
        'password' => 'required|string|min:8|confirmed',
    ]);

   
    $user = User::findOrFail($request->user); 
  
    $user->password = bcrypt($request->password);
    $user->save();

    return redirect()->route('login')->with('status', 'Contraseña actualizada con éxito');
}

}
