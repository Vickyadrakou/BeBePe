<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use App\Models\Resource;

class AdminController extends Controller
{
    public function index()
    {
        $totalReports = Report::count();
        $pendingReports = Report::where('status', 'pending')->count();
        $processedReports = Report::whereIn('status', ['processing', 'resolved'])->count();
        $latestReports = Report::latest()->take(5)->get();
        $latestUsers = User::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalReports', 'pendingReports', 'processedReports', 'latestReports', 'latestUsers'));
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('admin.reports.show', compact('report'));
    }

    public function reports(Request $request)
    {
        $query = Report::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $reports = $query->paginate(10);
        return view('admin.reports.index', compact('reports'));
    }

    public function updateStatus(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:pending,processing,resolved',
        ]);

        $report->status = $request->status;
        $report->save();

        return back()->with('success', 'Statut du signalement mis à jour avec succès.');
    }

    public function users(Request $request)
    {
        $query = User::latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('id', 'like', "%{$search}%");
            });
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $users = $query->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'role' => 'required|in:admin,user',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroyUser($id)
    {
        if (auth()->id() == $id) {
            return back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        $user = User::findOrFail($id);
        
        // Optional: Delete related reports if necessary, or keep them for records
        // $user->reports()->delete();
        
        $user->delete();

        return back()->with('success', 'Utilisateur supprimé avec succès.');
    }

    public function resources()
    {
        $resources = Resource::latest()->paginate(10);
        return view('admin.resources.index', compact('resources'));
    }

    public function createResource()
    {
        return view('admin.resources.create');
    }

    public function storeResource(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'required|string',
            'image_path' => 'nullable|image|max:2048',
            'video_path' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg|max:20480', // 20MB max
            'document_path' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ]);

        $data = $request->only(['title', 'category', 'summary', 'content']);
        $data['slug'] = \Illuminate\Support\Str::slug($request->title);
        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('resources/images', 'public');
        }

        if ($request->hasFile('video_path')) {
            $data['video_path'] = $request->file('video_path')->store('resources/videos', 'public');
        }

        if ($request->hasFile('document_path')) {
            $data['document_path'] = $request->file('document_path')->store('resources/documents', 'public');
        }

        Resource::create($data);

        return redirect()->route('admin.resources.index')->with('success', 'Ressource créée avec succès.');
    }

    public function editResource($id)
    {
        $resource = Resource::findOrFail($id);
        return view('admin.resources.edit', compact('resource'));
    }

    public function updateResource(Request $request, $id)
    {
        $resource = Resource::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'required|string',
            'image_path' => 'nullable|image|max:2048',
            'video_path' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg|max:20480',
            'document_path' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ]);

        $data = $request->only(['title', 'category', 'summary', 'content']);
        $data['slug'] = \Illuminate\Support\Str::slug($request->title);
        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('resources/images', 'public');
        }

        if ($request->hasFile('video_path')) {
            $data['video_path'] = $request->file('video_path')->store('resources/videos', 'public');
        }

        if ($request->hasFile('document_path')) {
            $data['document_path'] = $request->file('document_path')->store('resources/documents', 'public');
        }

        $resource->update($data);

        return redirect()->route('admin.resources.index')->with('success', 'Ressource mise à jour avec succès.');
    }

    public function destroyResource($id)
    {
        $resource = Resource::findOrFail($id);

        if ($resource->image_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($resource->image_path);
        }
        if ($resource->video_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($resource->video_path);
        }
        if ($resource->document_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($resource->document_path);
        }

        $resource->delete();

        return back()->with('success', 'Ressource supprimée avec succès.');
    }
}
