<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validación del correo electrónico
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Intentar enviar el enlace para restablecer la contraseña
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Verificar el resultado del envío del enlace
        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status)) // Enviar mensaje de éxito
                    : back()->withInput($request->only('email')) // Enviar mensaje de error
                            ->withErrors(['email' => __($status)]);
    }
}
