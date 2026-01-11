@extends('layout.dash')

@section('dash_content')
<div class="container-fluid py-4">
    

    {{-- Onglet Planning du jour --}}
    @if($tab == 'planning')
        <div class="row">
            <div class="header-medecin mb-4">
        
               <p class="text-muted">Voici votre programme pour aujourd'hui, {{ now()->translatedFormat('l d F Y') }}</p>
            </div>
            {{-- Résumé rapide --}}
            <div class="col-md-4 mb-4">
                <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                        <h5>Consultations attendues</h5>
                        <div class="display-4">{{ $planningDuJour->count() }}</div>
                    </div>
                </div>
            </div>

            {{-- Liste chronologique --}}
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-white font-weight-bold">
                        📋 Ordre de passage
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Heure</th>
                                        <th>Patient</th>
                                        <th>Motif / Note</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($planningDuJour as $rdv)
                                        <tr>
                                            <td class="fw-bold">{{ $rdv->heure_rdv }}</td>
                                            <td>
                                                <strong>{{ $rdv->user->nom }}</strong><br>
                                                <small class="text-muted">{{ $rdv->user->telephone }}</small>
                                            </td>
                                            <td>{{ $rdv->commentaire ?? 'Consultation standard' }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">Dossier</button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-5 text-muted">
                                                Aucun rendez-vous pour le moment. 
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Onglet Mes Patients --}}
    @if($tab == 'mes_patients')
        <div class="card shadow">
            <div class="card-header">Liste de vos patients suivis</div>
            <div class="card-body">
                {{-- Ici on pourrait lister tous les patients ayant déjà eu un RDV avec lui --}}
                <p class="text-muted">Fonctionnalité en cours de développement...</p>
            </div>
        </div>
    @endif

    @if(isset($tab) && $tab == 'profil')
        {{-- Affiche le formulaire de profil --}}
        @include('layout.partial.profil')
        
    @endif
</div>
@endsection