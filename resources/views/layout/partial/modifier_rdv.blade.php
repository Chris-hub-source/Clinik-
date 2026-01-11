<div class="modal fade" id="editRdv{{ $rdv->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $rdv->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="modalLabel{{ $rdv->id }}">Modifier le rendez-vous</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('rdv.modifier', $rdv->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <p>Patient : <strong>{{ $rdv->user->nom }}</strong></p>
                    
                    <div class="mb-3">
                        <label class="form-label">Nouvelle Date</label>
                        <input type="date" name="date_rdv" class="form-control" value="{{ $rdv->date_rdv }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nouvelle Heure</label>
                        <input type="time" name="heure_rdv" class="form-control" value="{{ $rdv->heure_rdv }}" required>
                    </div>

                    <div class="alert alert-info">
                        <small>Note : En modifiant l'heure, le statut repassera automatiquement "En attente".</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-warning">Enregistrer les modifications</button>
                </div>
            </form>
        </div>
    </div>
</div>