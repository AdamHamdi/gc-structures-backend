<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        return response()->json(TeamMember::where('is_active', true)->orderBy('order')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'role'      => 'required|string|max:255',
            'bio'       => 'nullable|string',
            'photo'     => 'nullable|image|max:2048',
            'email'     => 'nullable|email|max:255',
            'linkedin'  => 'nullable|url|max:255',
            'order'     => 'integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('team', 'public');
        }

        $member = TeamMember::create($validated);

        return response()->json($member, 201);
    }

    public function show(TeamMember $teamMember)
    {
        return response()->json($teamMember);
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $validated = $request->validate([
            'name'      => 'sometimes|string|max:255',
            'role'      => 'sometimes|string|max:255',
            'bio'       => 'nullable|string',
            'photo'     => 'nullable|image|max:2048',
            'email'     => 'nullable|email|max:255',
            'linkedin'  => 'nullable|url|max:255',
            'order'     => 'integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('photo')) {
            if ($teamMember->photo) {
                Storage::disk('public')->delete($teamMember->photo);
            }
            $validated['photo'] = $request->file('photo')->store('team', 'public');
        }

        $teamMember->update($validated);

        return response()->json($teamMember);
    }

    public function destroy(TeamMember $teamMember)
    {
        if ($teamMember->photo) {
            Storage::disk('public')->delete($teamMember->photo);
        }

        $teamMember->delete();

        return response()->json(null, 204);
    }
}
