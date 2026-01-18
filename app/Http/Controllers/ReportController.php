<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'description' => 'required|string|max:1000',
            'frequency' => 'required|string',
            'image_file' => 'nullable|image|max:5120', // 5MB
            'video_file' => 'nullable|mimes:mp4,mov,ogg,qt|max:20480', // 20MB
            'document_file' => 'nullable|mimes:pdf,doc,docx,txt|max:5120', // 5MB
        ]);

        $report = new Report();
        $report->user_id = Auth::id();
        
        // Handle "Autre" type with details
        if ($request->type === 'Autre' && $request->filled('other_type')) {
            $report->type = 'Autre : ' . $request->other_type;
        } else {
            $report->type = $request->type;
        }

        $report->description = $request->description;
        $report->frequency = $request->frequency;
        $report->location = $request->location;
        $report->is_anonymous = $request->has('is_anonymous');
        $report->status = 'pending';

        if ($request->hasFile('image_file')) {
            $report->image_path = $request->file('image_file')->store('reports/images', 'public');
        }

        if ($request->hasFile('video_file')) {
            $report->video_path = $request->file('video_file')->store('reports/videos', 'public');
        }

        if ($request->hasFile('document_file')) {
            $report->document_path = $request->file('document_file')->store('reports/documents', 'public');
        }

        $report->save();

        return redirect()->route('report')->with('success', 'Votre signalement a été envoyé avec succès. Nos experts vont le traiter dans les plus brefs délais.');
    }
}
