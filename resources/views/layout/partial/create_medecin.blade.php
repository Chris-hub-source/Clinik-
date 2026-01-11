<form action="{{ route('medecin.store') }}" method="POST" class="p-2">
    @csrf

    <div class="form-grid">
        <div class="input-group full-width">
            <label class="custom-label" for="name">
                <i class="fas fa-user-circle mr-1"></i> Nom complet du médecin
            </label>
            <input type="text" id="name" name="name" class="custom-input" placeholder="Ex: Dr. Michel SOGLO" required value="{{ old('name') }}">
            @error('name') 
                <span class="error-text"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</span> 
            @enderror
        </div>

        <div class="input-group">
            <label class="custom-label" for="email">
                <i class="fas fa-envelope mr-1"></i> Email Professionnel
            </label>
            <input type="email" id="email" name="email" class="custom-input" placeholder="nom@miabe-clinik.tg" required value="{{ old('email') }}">
            @error('email') 
                <span class="error-text">{{ $message }}</span> 
            @enderror
        </div>

        <div class="input-group">
            <label class="custom-label" for="telephone">
                <i class="fas fa-phone mr-1"></i> Numéro de Téléphone
            </label>
            <input type="text" id="telephone" name="telephone" class="custom-input" placeholder="+228 90 00 00 00" required value="{{ old('telephone') }}">
            @error('telephone') 
                <span class="error-text">{{ $message }}</span> 
            @enderror
        </div>

        <div class="input-group full-width">
            <label class="custom-label" for="specialite">
                <i class="fas fa-stethoscope mr-1"></i> Spécialité Médicale
            </label>
            <select id="specialite" name="specialite" class="custom-input" required>
                <option value="" disabled selected>Choisir une spécialité...</option>
                @foreach(\App\Models\User::listSpecialites() as $key => $label)
                    <option value="{{ $key }}" {{ old('specialite') == $key ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
            @error('specialite') 
                <span class="error-text">{{ $message }}</span> 
            @enderror
        </div>
    </div>

    <div class="password-banner mt-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-info-circle fa-2x mr-3 text-primary"></i>
            <span>
                Un mot de passe par défaut (<strong>Miabe2026</strong>) sera attribué automatiquement. 
                Le médecin devra le modifier dès sa première connexion.
            </span>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary btn-lg shadow-sm px-5 rounded-pill">
            <i class="fas fa-save mr-2"></i> Créer le compte
        </button>
    </div>
</form>

<style>
    /* On ajoute de l'espace tout autour du formulaire */
    .form-container-styled {
        padding: 30px;
        background-color: #ffffff;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 25px; /* Plus d'espace entre les champs */
    }

    .full-width {
        grid-column: span 2;
    }

    .input-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 5px;
    }

    /* Labels plus discrets et élégants */
    .custom-label {
        font-size: 0.75rem;
        font-weight: 700;
        color: #5a5c69;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Inputs avec des coins plus doux et moins de gris */
    .custom-input {
        width: 90%;
        padding: 14px 18px;
        border: 1px solid #e3e6f0;
        border-radius: 12px; /* Coins plus arrondis */
        background-color: #fdfeff;
        color: #4e73df;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .custom-input:focus {
        outline: none;
        border-color: #4e73df;
        box-shadow: 0 4px 12px rgba(78, 115, 223, 0.08);
        background-color: #fff;
    }

    /* La bannière d'info plus aérée */
    .password-banner {
        background-color: #f0f4ff;
        border-left: 4px solid #4e73df;
        padding: 20px;
        border-radius: 12px;
        font-size: 0.88rem;
        color: #4e73df;
        margin-top: 25px;
        line-height: 1.5;
    }

    /* Bouton plus fin et centré/aligné proprement */
    .btn-save-medecin {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        color: white;
        border: none;
        padding: 14px 35px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
        box-shadow: 0 4px 15px rgba(78, 115, 223, 0.2);
    }

    .btn-save-medecin:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(78, 115, 223, 0.3);
    }

    @media (max-width: 768px) {
        .form-grid { grid-template-columns: 1fr; }
        .full-width { grid-column: span 1; }
    }
</style>