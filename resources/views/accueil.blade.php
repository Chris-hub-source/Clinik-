@extends('layout.main')
@section('titre_onglet', 'Accueil - MIABE CLINIK')

@section('content')
  
    <!-- Section Services -->
    <section class="services-section">
     <div class="services-container">
        <div class="service-card">
            <div class="icon-wrapper">
                <div class="blob-bg color-1"></div>
                <img src="/images/calendar.png" alt="Calendrier">
            </div>
            <h3>Accédez aux soins plus facilement</h3>
            <p>Réservez des consultations en présentiel et recevez des rappels pour ne jamais les manquer.</p>
        </div>

        <div class="service-card">
            <div class="icon-wrapper">
                <div class="blob-bg color-2"></div>
                <img src="/images/chat.png" alt="Soins">
            </div>
            <h3>Bénéficiez de soins personnalisés</h3>
            <p>Obtenez des conseils préventifs et recevez des soins quand vous en avez besoin.</p>
        </div>

        <div class="service-card">
            <div class="icon-wrapper">
                <div class="blob-bg color-3"></div>
                <img src="/images/heart.png" alt="Santé">
            </div>
            <h3>Gérez votre santé</h3>
            <p>Rassemblez facilement toutes vos informations de santé et celles de ceux qui comptent pour vous.</p>
        </div>
    </div>
</section>
        
            
    
    <!-- Section Équipe -->
    <section class="equipe">
        <div class="equipe-header">
        <h2>Notre Équipe</h2>
        <p>Découvrez nos professionnels de santé qualifiés et expérimentés.</p>
    </div>

    <div class="equipe-grid">
        <div class="equipe-card">
            <div class="equipe-img">
                <img src="{{ asset('images/medecin.png') }}" alt="Dr. Nom">
            </div>
            <div class="equipe-info">
                <h3>Dr. Yao Koffi</h3>
                <p class="specialite">Cardiologue</p>
            </div>
        </div>

        <div class="equipe-card">
            <div class="equipe-img">
                <img src="{{ asset('images/medecin1.png') }}" alt="Dr. Nom">
            </div>
            <div class="equipe-info">
                <h3>Dr. Amivi Mensah</h3>
                <p class="specialite">Pédiatre</p>
            </div>
        </div>

        <div class="equipe-card">
            <div class="equipe-img">
                <img src="{{ asset('images/medecin2.png') }}" alt="Dr. Nom">
            </div>
            <div class="equipe-info">
                <h3>Dr. Jean Dupont</h3>
                <p class="specialite">Généraliste</p>
            </div>
        </div>
    </div>
    </section>

    


@endsection