<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __invoke(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        
        Mail::to('info@example.com')->send(new \App\Mail\ContactFormMail($validatedData));

        return redirect()->back()->with('success', 'Message sent successfully.');
    }
}
