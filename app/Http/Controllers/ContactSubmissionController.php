<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactSubmissionController extends Controller
{
    // Public: submit the contact form
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:30',
            'company' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        $submission = ContactSubmission::create($validated);

        return response()->json(['message' => 'Votre message a bien été envoyé.'], 201);
    }

    // Admin: list all submissions
    public function index(Request $request)
    {
        $status = $request->query('status');

        $query = ContactSubmission::orderByDesc('created_at');

        if ($status) {
            $query->where('status', $status);
        }

        return response()->json($query->get());
    }

    // Admin: view one submission and mark as read
    public function show(ContactSubmission $contactSubmission)
    {
        if ($contactSubmission->status === 'new') {
            $contactSubmission->update([
                'status'  => 'read',
                'read_at' => now(),
            ]);
        }

        return response()->json($contactSubmission);
    }

    // Admin: update status
    public function update(Request $request, ContactSubmission $contactSubmission)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,read,replied,archived',
        ]);

        $contactSubmission->update($validated);

        return response()->json($contactSubmission);
    }

    // Admin: delete
    public function destroy(ContactSubmission $contactSubmission)
    {
        $contactSubmission->delete();

        return response()->json(null, 204);
    }
}
