<?php

namespace App\Http\Controllers;

use App\Models\WasteReport;
use Illuminate\Http\Request;

class PublicWasteReportController extends Controller
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
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $report = new WasteReport();
        $report->reporter_name = $validated['reporter_name'];
        $report->latitude = $validated['latitude'];
        $report->longitude = $validated['longitude'];
        $report->description = $validated['description'];
        $report->status = 'pending';

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('waste-reports', 'public');
                $images[] = $path;
            }
            $report->images = $images;
        }

        $report->save();

        return redirect()->route('waste-reports.thank-you')->with('success', 'تم إرسال البلاغ بنجاح');
    }

    public function thankYou()
    {
        return view('waste-reports.thank-you');
    }
}
