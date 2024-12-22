<?php

namespace App\Http\Controllers;

use App\Models\WasteReport;
use Illuminate\Http\Request;

class WasteReportController extends Controller
{
    public function create()
    {
        return view('waste-reports.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reporter_name' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('waste-reports', 'public');
                $images[] = $path;
            }
        }

        WasteReport::create([
            'reporter_name' => $validated['reporter_name'],
            'latitude' => $validated['latitude'],
            'longitude' => $validated['longitude'],
            'description' => $validated['description'],
            'images' => $images,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'تم تقديم البلاغ بنجاح');
    }
}
