<div class="table-responsive">
    <table class="table table-hover align-middle shadow-sm border">
        <thead class="bg-light">
            <tr>
                <th><i class="fas fa-user-md mr-1"></i> Médecin</th>
                <th><i class="fas fa-calendar-alt mr-1"></i> Date & Heure</th>
                <th><i class="fas fa-comment-medical mr-1"></i> Motif</th>
                <th><i class="fas fa-info-circle mr-1"></i> État</th>
                {{-- On peut garder une colonne action uniquement pour "Annuler" --}}
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mesRdvs as $rdv)
                <tr>
                    {{-- Nom du médecin et sa spécialité --}}
                    <td>
                        <div class="font-weight-bold">Dr. {{ $rdv->medecin->name }}</div>
                        <small class="text-primary">{{ $rdv->medecin->specialite_label ?? $rdv->medecin->specialite }}</small>
                    </td>

                    {{-- Date et Heure formatées proprement --}}
                    <td>
                        <div class="text-dark">{{ \Carbon\Carbon::parse($rdv->date_rdv)->format('d/m/Y') }}</div>
                        <div class="small text-muted">{{ $rdv->heure_rdv }}</div>
                    </td>

                    {{-- Motif (tronqué si trop long pour garder le tableau propre) --}}
                    <td class="text-muted">
                        <small>{{ Str::limit($rdv->motif, 40) }}</small>
                    </td>

                    {{-- État avec des badges de couleurs différentes --}}
                    <td>
                        @if($rdv->statut == 'Confirmé')
                            <span class="badge-status status-confirmed">
                                <i class="fas fa-check-circle mr-1"></i> Confirmé
                            </span>
                        @elseif($rdv->statut == 'Annulé')
                            <span class="badge-status status-cancelled">
                                <i class="fas fa-times-circle mr-1"></i> Annulé
                            </span>
                        @else
                            <span class="badge-status status-pending">
                                <i class="fas fa-clock mr-1"></i> En attente
                            </span>
                        @endif
                    </td>

                    {{-- Action : Le patient peut seulement annuler si c'est encore "En attente" --}}
                    <td class="text-center">
                        @if($rdv->statut == 'En attente')
                            <form action="{{ route('rdv.destroy', $rdv->id) }}" method="POST" 
                                  onsubmit="return confirm('Souhaitez-vous vraiment annuler cette demande ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger border-0">
                                    <i class="fas fa-trash-alt"></i> Annuler
                                </button>
                            </form>
                        @else
                            <span class="text-muted small">Aucune action</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-5 text-muted">
                        <i class="fas fa-calendar-minus fa-3x mb-3 d-block"></i>
                        Vous n'avez pas encore de rendez-vous enregistré.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>