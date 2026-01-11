<div class="card border-0 shadow-sm">
    <div class="card-header bg-primary text-white py-3">
        <h5 class="mb-0"><i class="fas fa-calendar-plus mr-2"></i>Prendre un nouveau rendez-vous</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('rdv.store') }}" method="POST">
            @csrf

            {{-- Champs cachés pour le fonctionnement automatique --}}
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <input type="hidden" name="statut" value="En attente">

            {{-- Sélection du Médecin avec traduction de la spécialité --}}
            <div class="mb-4">
                <label class="form-label font-weight-bold text-dark">Choisir un Médecin & Spécialité</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="fas fa-user-md text-primary"></i></span>
                    <select name="medecin_id" class="form-control form-select" required>
                        <option value="" selected disabled>Cliquez pour choisir un spécialiste...</option>
                        
                        @php 
                            // On récupère ton tableau de correspondances du modèle User
                            $nomsSpec = \App\Models\User::listSpecialites();  
                        @endphp

                        @forelse($medecins as $medecin)
                            <option value="{{ $medecin->id }}">
                                Dr {{ $medecin->name }} 
                                — {{ $nomsSpec[$medecin->specialite] ?? ($medecin->specialite ?? 'Généraliste') }}
                            </option>
                        @empty
                            <option disabled>Aucun médecin disponible pour le moment</option>
                        @endforelse
                    </select>
                </div>
                <small class="text-muted">La liste affiche tous les médecins inscrits sur la plateforme.</small>
            </div>

            {{-- Date et Heure sur la même ligne --}}
            <div class="row mb-4">
                <div class="col-md-6">
                    <label class="form-label font-weight-bold text-dark">Date du rendez-vous</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-calendar-day"></i></span>
                        <input type="date" name="date_rdv" class="form-control" 
                               required min="{{ date('Y-m-d') }}" 
                               value="{{ date('Y-m-d') }}">
                    </div>
                </div>
                <div class="col-md-6 mt-3 mt-md-0">
                    <label class="form-label font-weight-bold text-dark">Heure souhaitée</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-clock"></i></span>
                        <input type="time" name="heure_rdv" class="form-control" required>
                    </div>
                </div>
            </div>

            {{-- Motif de consultation (Indispensable car requis dans ta migration) --}}
            <div class="mb-4">
                <label class="form-label font-weight-bold text-dark">Motif de la consultation</label>
                <textarea name="motif" class="form-control" rows="3" 
                          placeholder="Décrivez brièvement la raison de votre visite (ex: Douleur, suivi, certificat...)" 
                          required></textarea>
            </div>

            <hr>

            <div class="d-flex justify-content-between align-items-center">
                <p class="text-muted small mb-0">
                    <i class="fas fa-info-circle"></i> Votre demande sera examinée par notre secrétariat.
                </p>
                <button type="submit" class="btn btn-primary px-4 shadow-sm">
                    <i class="fas fa-paper-plane mr-2"></i> Envoyer ma demande
                </button>
            </div>
        </form>
    </div>
</div>