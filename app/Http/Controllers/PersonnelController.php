<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'telephone' => 'required|string',
        
    ]);

         User::create([
        'name' => $request->name,
        'email' => $request->email,
        'telephone' => $request->telephone,
        'role' => 'Medecin', // On force le rôle ici !
        'password' => bcrypt('Miabe2026'), // Mot de passe par défaut
    ]);

    return back()->with('success', 'Médecin ajouté !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
