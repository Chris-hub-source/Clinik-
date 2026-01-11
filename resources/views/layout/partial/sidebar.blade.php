<div class="sidebar-logo">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('images/logo1.png') }}" alt="MIABE CLINIK Logo">
                </a>
</div>
@if(Auth::user()->role == 'Secretaire')
<small style="color: #ccc;">Sécrétaire</small>
    <li><a href="{{ route('dashboard') }}" class="{{ $tab == 'index' ? 'active' : '' }}">🏠 Accueil</a></li>
    <li><a href="{{ route('dashboard', ['tab' => 'tous_rdv']) }}" class="{{ $tab == 'tous_rdv' ? 'active' : '' }}">📅 Rendez-vous</a></li>
   {{-- <li><a href="{{ route('dashboard', ['tab' => 'utilisateurs']) }}" class="{{ $tab == 'utilisateurs' ? 'active' : '' }}">👥 Patients</a></li> --}}
    <li><a href="{{ route('dashboard', ['tab' => 'add_medecin']) }}" >Gérer Personnel </a></li>
 {{--   <li><a href="{{ route('dashboard', ['tab' => 'historique']) }}" class="{{ $tab == 'historique' ? 'active' : '' }}">📜 Historique</a></li> --}}
    <li><a href="{{ route('dashboard', ['tab' => 'profil']) }}" class="{{ $tab == 'profil' ? 'active' : '' }}">👤 Mon Profil</a></li> 
                
            
@endif

@if(Auth::user()->role == 'Patient')
<small style="color: #ccc;">Patient</small>
    <li><a href="{{ route('dashboard') }}" class="{{ $tab == 'index' ? 'active' : '' }}">🏠 Accueil</a></li>
    <li><a href="{{ route('dashboard', ['tab' => 'mes_rdv']) }}" class="{{ $tab == 'mes_rdv' ? 'active' : '' }}">📅 Mes RDV</a></li>
    <li><a href="{{ route('dashboard', ['tab' => 'nouveau_rdv']) }}" class="{{ $tab == 'nouveau_rdv' ? 'active' : '' }}">➕ Prendre RDV</a></li>
    <li><a href="{{ route('dashboard', ['tab' => 'profil']) }}" class="{{ $tab == 'profil' ? 'active' : '' }}">👤 Mon Profil</a></li>
@endif

@if (Auth::user()->role == 'Medecin')
    <small style="color: #ccc;">Medecin</small>
    <li><a href="{{ route('dashboard') }}" class="{{ $tab == 'index' ? 'active' : '' }}">🏠 Accueil</a></li>
    <li><a href="{{ route('dashboard', ['tab' => 'planning']) }}" class="{{ $tab == 'planning' ? 'active' : '' }}">📅 Mon Planning</a></li>
    <li><a href="{{ route('dashboard', ['tab' => 'mes_patients']) }}" class="{{ $tab == 'mes_patients' ? 'active' : '' }}">👥 Mes Patients</a></li>
    <li><a href="{{ route('dashboard', ['tab' => 'profil']) }}" class="{{ $tab == 'profil' ? 'active' : '' }}">👤 Mon Profil</a></li>
@endif