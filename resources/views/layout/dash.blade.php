<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - MIABE CLINIK</title>
    
    <link rel="stylesheet" href="{{ asset('style2.css') }}">
    <link rel="stylesheet" href="{{ asset('partial.css') }}">
    </head>
<body>
    {{-- Notifications --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Barre de navigation haute --}}
   <header class="navbar-dash"> 
    <div class="header-title">
        <h1>Tableau de bord de Mr/Mme {{ Auth::user()->name}}</h1>
    </div>
   </header>
    <div class="wrapper">
        {{-- Barre latérale (Sidebar) --}}
        <aside>
            <nav>
                <ul style="list-style: none; padding: 0;">
                    {{-- Lien commun --}}
                    

                    {{-- On inclut le menu dynamique selon le rôle --}}
                    @include('layout.partial.sidebar')

                    {{-- Bouton Déconnexion avec formulaire caché --}}
                    <li style="margin-top: auto; border-top: 1px solid rgba(255,255,255,0.1);">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            <a href="{{ route('logout') }}" 
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                            style="color: #ff7675; display: flex; align-items: center; padding: 15px 25px; text-decoration: none;">
                                <span style="margin-right: 10px;">🚪</span> Déconnexion
                            </a>
                    </li>
                </ul>
            </nav>
        </aside>

        {{-- Contenu central --}}
        <main>
            @yield('dash_content')
        </main>
    </div>

    

   
</body>
</html>