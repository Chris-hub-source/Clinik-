<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>Heure</th>
                <th>Patient</th>
                <th>Médecin</th>
                <th>État</th>
                
            </tr>
        </thead>
        <tbody>
            @forelse($rdvs as $rdv)
                <tr>
                    <td class="fw-bold text-primary">{{ $rdv->heure_rdv }}</td>
                    <td>{{ $rdv->patient->name }}</td>
                    <td>Dr {{ $rdv->medecin->name }}</td>
                    <td>
                        @if($rdv->statut == 'Confirmé')
                            <span class="badge-status status-confirmed">Confirmé</span>
                        @elseif($rdv->statut == 'En attente')
                            <span class="badge-status status-pending">En attente</span>
                        @else 
                            <span class="badge bg-secondary">{{ $rdv->statut }}</span>
                        @endif 
                    </td>
                   
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">
                        Aucun rendez-vous prévu pour aujourd'hui.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>