@extends('layout.dash')
@section('dash_content')

<div class="container-fluid py-4">

    {{-- 1. BLOC STATISTIQUES --}}
    @if($tab == 'index')
        <div class="row mb-4">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Demandes</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalRdv }}</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">RDV Aujourd'hui</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $rdvDuJour->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- 2. ZONE DE CONTENU DYNAMIQUE --}}
    <div class="card shadow mb-4">
        {{-- Cas 1 : Accueil --}}
        @if($tab == 'index')
            @include('layout.partial.rdv_jour', ['rdvs' => $rdvDuJour])

        {{-- Cas 2 : Tous les RDV --}}
        @elseif($tab == 'tous_rdv')
            @include('layout.partial.rdv_complet', ['rdvs' => $tousLesRdv])

        {{-- Cas 3 : Ajouter un Médecin --}}
        @elseif($tab == 'add_medecin')
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Enregistrer un Médecin</h6>
            </div>
            <div class="card-body">
                @include('layout.partial.create_medecin')
            </div>
            
        {{-- Cas 4 : Gérer son profil --}}
        @elseif($tab == 'profil')
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Mon Profil</h6>
            </div>
            <div class="card-body">
                @include('layout.partial.profil')
            </div>
        @endif

    </div> 

</div> 
@endsection