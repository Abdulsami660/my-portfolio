<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $contact = ContactMessage::create($data);

        // Optionally notify yourself by email:
        // Mail::to(config('mail.from.address'))->send(new ContactReceived($contact));

        return response()->json([
            'message' => 'Thanks! Your message has been sent.',
            'data' => $contact,
        ], 201);
    }
}
