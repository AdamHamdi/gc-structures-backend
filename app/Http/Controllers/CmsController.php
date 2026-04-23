<?php

namespace App\Http\Controllers;

use App\Models\CmsSection;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function getPage(string $page)
    {
        $sections = CmsSection::where('page', $page)->get();

        $data = [];
        foreach ($sections as $section) {
            $data[$section->section] = $section->content;
        }

        return response()->json($data);
    }

    public function updateSection(Request $request, string $page, string $section)
    {
        $request->validate([
            'content' => 'required|array',
        ]);

        $cms = CmsSection::updateOrCreate(
            ['page' => $page, 'section' => $section],
            ['content' => $request->input('content')]
        );

        return response()->json($cms);
    }
}
