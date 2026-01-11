<header class='hero'>
<nav class="navbar">
    <div class="logo">
        <a href="/"><img src="{{asset('/images/logo1.png')}}" alt="Logo du site"></a>
    </div>

    <div class="auth">
        @if (Auth::check())
            <a href="/logout">Déconnexion</a>
        @else
            <a href="{{ route('login') }}">Connexion</a>
            <a href="{{ route('register') }}">Inscription</a>
        @endif
    </div>
</nav>
       <div class="hero-body">
                <section class="presentation">
                    <h1 class="">Bienvenue à MIABE CLINIK</h1>
                    <p class="">Votre santé, notre priorité.</p>
                    <p>Découvrez nos services médicaux de qualité et prenez rendez-vous avec nos spécialistes.</p>
                    <a class="" href="{{ route('login') }}" role="button">Prendre Rendez-vous</a> 
                </section>

                    <div class="hero-image">
                        <img src="{{ asset('images/femme.png') }}" alt="Médecin MIABE CLINIK">
                    </div>
        </div>

</header>
