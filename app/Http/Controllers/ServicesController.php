<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function create()
    {
        return inertia('Services/Create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            // Add other validation rules for your form fields
        ]);

        // Create and save the service
        $service = Services::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'duration' => $request->input('duration'),
        ]);

        $service->save();
        // Redirect or return a response as needed
    }
}
