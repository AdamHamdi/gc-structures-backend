<?php

namespace App\Http\Controllers;

use App\Models\Reference;
use App\Models\ReferenceImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReferenceController extends Controller
{
    public function index()
    {
        return response()->json(
            Reference::where('is_active', true)
                ->with('images')
                ->orderBy('order')
                ->get()
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'client'      => 'nullable|string|max:255',
            'location'    => 'nullable|string|max:255',
            'category'    => 'nullable|string|max:255',
            'year'        => 'nullable|integer|digits:4',
            'is_featured' => 'boolean',
            'is_active'   => 'boolean',
            'order'       => 'integer',
            'images'      => 'nullable|array',
            'images.*'    => 'image|max:5120',
        ]);

        $reference = Reference::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('references', 'public');
                ReferenceImage::create([
                    'reference_id' => $reference->id,
                    'path'         => $path,
                    'is_cover'     => $index === 0,
                    'order'        => $index,
                ]);
            }
        }

        return response()->json($reference->load('images'), 201);
    }

    public function show(Reference $reference)
    {
        return response()->json($reference->load('images'));
    }

    public function update(Request $request, Reference $reference)
    {
        $validated = $request->validate([
            'title'       => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'client'      => 'nullable|string|max:255',
            'location'    => 'nullable|string|max:255',
            'category'    => 'nullable|string|max:255',
            'year'        => 'nullable|integer|digits:4',
            'is_featured' => 'boolean',
            'is_active'   => 'boolean',
            'order'       => 'integer',
        ]);

        $reference->update($validated);

        return response()->json($reference->load('images'));
    }

    public function destroy(Reference $reference)
    {
        foreach ($reference->images as $image) {
            Storage::disk('public')->delete($image->path);
        }

        $reference->delete();

        return response()->json(null, 204);
    }

    public function destroyImage(ReferenceImage $image)
    {
        Storage::disk('public')->delete($image->path);
        $image->delete();

        return response()->json(null, 204);
    }
}
