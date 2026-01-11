<?php

namespace App\Http\Controllers;

use App\Models\RDV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RDVController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //   
        $rdvs = RDV::all();
        return view('rdv', compact('rdvs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('rdv.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
   {
    $request->validate([
        'date_rdv' => 'required|date',
        'heure_rdv' => 'required',
        'motif' => 'required|string|max:255',
        'medecin_id' => 'required|exists:users,id',
    ]);

    RDV::create([
        'user_id' => Auth::id(), // Plus de trait rouge avec Auth::id()
        'medecin_id' => $request->medecin_id,
        'date_rdv' => $request->date_rdv,
        'heure_rdv' => $request->heure_rdv,
        'motif' => $request->motif,
        'statut' => 'En attente',
    ]);

    return redirect()->back()->with('success', 'Demande de rendez-vous enregistrée.');
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
        $rdv = RDV::findOrFail($id);
        $rdv->update($request->all());
        return redirect()->back()->with('success', 'Rendez-vous mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $rdv = RDV::findOrFail($id);
        $rdv->delete();
        return redirect()->back()->with('success', 'Rendez-vous supprimé avec succès.');
    }


    public function updateStatus(Request $request, $id)
{
    $rdv = RDV::findOrFail($id);

    // Si on essaie de confirmer, on refait une petite vérification de sécurité
    if ($request->statut === 'Confirmé') {
        $conflit = RDV::where('user_id', $rdv->user_id) // ID du médecin
            ->where('date_rdv', $rdv->date_rdv)
            ->where('heure_rdv', $rdv->heure_rdv)
            ->where('statut', 'Confirmé')
            ->where('id', '!=', $id)
            ->exists();

        if ($conflit) {
            return back()->with('error', "Impossible de confirmer : le médecin a déjà un RDV à cette heure précise.");
        }
    }

    $rdv->update(['statut' => $request->statut]);

    return back()->with('success', "Le statut a été mis à jour avec succès.");
}
    public function modifier(Request $request, $id)
    {
        $request->validate([
            'date_rdv' => 'required|date',
            'heure_rdv' => 'required',
        ]);

        $rdv = RDV::findOrFail($id);
        $rdv->update([
            'date_rdv' => $request->date_rdv,
            'heure_rdv' => $request->heure_rdv,
            'statut' => 'En attente' // On repasse en attente après modification
        ]);

        return back()->with('success', "Le rendez-vous a été déplacé.");
    }


}
