<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RDV;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        //
          $tab = $request->get('tab', 'index'); // 'index' est la valeur par défaut
          $user = Auth::user(); 
          $data = [
            'tab' => $tab,
            'user' => $user,
        ];
          
          // Logique selon le rôle
        switch ($user->role) {
            case 'Secretaire':
            $tousLesRdv = collect();
            if ($tab == 'tous_rdv') {
            $tousLesRdv = RDV::latest()->get(); // On récupère tout
         }
                $data = [
                    'tab' => $tab,
                    'totalRdv' => RDV::count(),
                    'rdvDuJour' => RDV::whereDate('date_rdv', today())->get(),
                    'tousLesRdv' => $tousLesRdv,
                ];
                return view('secretaire', $data);

            case 'Medecin':
                $tab = request()->query('tab', 'planning');
    $data = [
        'tab' => $tab,
        // Uniquement ses RDV confirmés pour aujourd'hui
        'planningDuJour' => RDV::where('user_id', Auth::id())
                                ->where('statut', 'Confirmé')
                                ->get(),
        // Ses statistiques personnelles
        'totalPatients' => RDV::where('user_id', Auth::id())->count(),
    ];
       return view('medecin', $data);

            case 'Patient':
                
                $data = [
                    'tab' => $tab,
                    'user' => $user,
                    'mesRdvs' => RDV::where('user_id', $user->id)->get(),
                    'tousLesRdv' => RDV::where('user_id', $user->id)->get(), 
                    'medecins' => User::where('role', 'Medecin')->get(),
                ];
                return view('patient', $data);

            default:
                abort(403, 'Rôle non reconnu.');
        }


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
