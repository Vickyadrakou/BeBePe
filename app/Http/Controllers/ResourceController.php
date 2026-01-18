<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Resource;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::latest()->paginate(12);
        return view('resources.index', compact('resources'));
    }
}
