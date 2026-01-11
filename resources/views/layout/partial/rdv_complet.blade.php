<div class="card-header py-3 d-flex justify-content-between align-items-center bg-white">
    <h6 class="m-0 font-weight-bold text-primary">Historique Complet des Rendez-vous</h6>
    <div class="input-group style-search-box" style="width: 250px;">
        <input type="text" class="form-control form-control-sm" placeholder="Rechercher un patient...">
    </div>
</div>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
                <tr>
                    <th>Date & Heure</th>
                    <th>Patient</th>
                    <th>Médecin / Spécialité</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rdvs as $rdv)
                    <tr>
                        {{-- Utilisation de date_rdv et heure_rdv --}}
                        <td class="align-middle">
                            <div class="font-weight-bold text-dark">
                                {{ \Carbon\Carbon::parse($rdv->date_rdv)->format('d/m/Y') }}
                            </div>
                            <small class="text-muted">
                                <i class="far fa-clock"></i> {{ $rdv->heure_rdv }}
                            </small>
                        </td>

                        {{-- Utilisation de la relation patient() --}}
                        <td class="align-middle">
                            <div class="d-flex align-items-center">
                                <div class="avatar-circle mr-2" style="width:30px; height:30px; background:#e3e6f0; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:12px;">
                                    {{ substr($rdv->patient->name ?? 'P', 0, 1) }}
                                </div>
                                <span>{{ $rdv->patient->name ?? 'Patient Inconnu' }}</span>
                            </div>
                        </td>

                        {{-- Utilisation de la relation medecin() --}}
                        <td class="align-middle">
                            <div>Dr. {{ $rdv->medecin->name ?? 'Non assigné' }}</div>
                            <span class="badge badge-secondary font-weight-normal">
                                {{-- Utilisation de la liste des spécialités pour un affichage propre --}}
                                {{ \App\Models\User::listSpecialites()[$rdv->medecin->specialite] ?? ($rdv->medecin->specialite ?? 'Généraliste') }}
                            </span>
                        </td>

                        {{-- Correction des conditions de statut (sensible à la casse) --}}
                        <td class="align-middle text-center">
                            @if($rdv->statut == 'Confirmé')
                                <span class="badge-status status-confirmed">Confirmé</span>
                            @elseif($rdv->statut == 'En attente')
                                <span class="badge-status status-pending">En attente</span>
                            @else
                                <span class="badge-status status-cancelled">{{ $rdv->statut }}</span>
                            @endif
                        </td>

                        <td class="align-middle text-center">
                            <div class="btn-group">
                                {{-- Lien vers la modification (Modal ou Page) --}}
                                <button class="btn-action btn-edit 
                                        data-toggle="modal" 
                                        data-target="#modalModifier{{ $rdv->id }}" 
                                        title="Modifier">
                                    <i class="fas fa-edit">Modifier</i>
                                </button>
                                
                                {{-- Formulaire de suppression/annulation --}}
                                <form action="{{ route('rdv.destroy', $rdv->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Annuler ce rendez-vous ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-cancel" title="Annuler">
                                        <i class="fas fa-times"> Annuler</i>
                                    </button>
                                </form>

                               <form action="{{ route('rdv.updateStatus', $rdv->id) }}" method="POST">
                                    @csrf
                                  {{--  @method('PATCH')  C'est cette ligne qui résout le problème --}}
                                    
                                    <input type="hidden" name="statut" value="Confirmé">
                                    <button type="submit" class="btn-action btn-confirm">Oui, confirmer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="fas fa-folder-open fa-3x mb-3"></i>
                            <p>Aucun rendez-vous trouvé dans la base de données.</p>
                        </td>
                    </tr>
                    
                @endforelse
                
            </tbody>
        </table>
    </div>
</div>

