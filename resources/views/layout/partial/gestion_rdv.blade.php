{{-- Vue spécifique Secrétaire --}}
<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>Patient</th>
                <th>Médecin</th>
                <th>Date & Heure</th>
                <th>État</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tousLesRdv as $rdv)
                @php
                    // Vérification de conflit pour le médecin sélectionné
                    $estOccupe = \App\Models\RDV::where('medecin_id', $rdv->medecin_id)
                        ->where('date_rdv', $rdv->date_rdv)
                        ->where('heure_rdv', $rdv->heure_rdv)
                        ->where('statut', 'Confirmé')
                        ->where('id', '!=', $rdv->id)
                        ->exists();
                @endphp
                <tr class="{{ $estOccupe && $rdv->statut == 'En attente' ? 'table-danger' : '' }}">
                    <td><strong>{{ $rdv->patient->name }}</strong></td>
                    <td>{{ $rdv->medecin->name }}</td>
                    <td>{{ $rdv->date_rdv }} à {{ $rdv->heure_rdv }}</td>
                    <td>
                        @if($estOccupe && $rdv->statut == 'En attente')
                            <span class="badge bg-danger">CONFLIT</span>
                        @else
                            <span class="badge-status status-confirmed{{ $rdv->statut == 'Confirmé' ? 'bg-success' : 'bg-warning' }}">
                                {{ $rdv->statut }}
                            </span>
                        @endif
                    </td>
                    <td>
                        {{-- Actions de la Secrétaire --}}
                        @if($rdv->statut == 'En attente' && !$estOccupe)
                            <form action="{{ route('rdv.updateStatus', $rdv->id) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="statut" value="Confirmé">
                                <button class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                            </form>
                        @endif
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalModif{{ $rdv->id }}">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>