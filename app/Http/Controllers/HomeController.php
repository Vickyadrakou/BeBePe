<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Resource;

class HomeController extends Controller
{
    public function index()
    {
        $featuredResource = Resource::where('is_featured', true)->latest()->first();
        
        // If no featured resource, take the latest one
        if (!$featuredResource) {
            $featuredResource = Resource::latest()->first();
        }

        // Get other resources, excluding the featured one
        $otherResources = Resource::where('id', '!=', $featuredResource ? $featuredResource->id : 0)
                                ->latest()
                                ->take(2)
                                ->get();

        return view('welcome', compact('featuredResource', 'otherResources'));
    }
}
