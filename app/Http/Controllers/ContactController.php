<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Mail;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'mensaje' => 'required|string',
        ]);

        $data = $request->only(['nombre', 'email', 'mensaje']);

        FacadesMail::to('garciaazamardaniel@gmail.com')->send(new ContactMessage($data));

        return back()->with('success', 'Tu mensaje ha sido enviado con éxito.');
    }
}

