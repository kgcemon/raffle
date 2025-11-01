<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Make sure model exists

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = User::select('name', 'phone', 'email')->orderBy('id', 'desc')->get();

        return response()->json([
            'registrations' => $registrations,
        ]);
    }



    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'note'  => 'nullable|string|max:255',
        ]);

        User::create($request->all());

        return response()->json(['success' => true]);
    }
}

