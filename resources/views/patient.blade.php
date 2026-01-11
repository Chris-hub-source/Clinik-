@extends('layout.dash')

@section('dash_content')
    
    
    @if(isset($tab) && $tab == 'mes_rdv')
        {{-- Affiche la liste des rendez-vous --}}
        @include('layout.partial.rdv')

    @elseif(isset($tab) && $tab == 'nouveau_rdv')
        {{-- Affiche le formulaire de prise de RDV --}}
        @include('layout.partial.prendre_rdv')

    @elseif(isset($tab) && $tab == 'profil')
        {{-- Affiche le formulaire de profil --}}
        @include('layout.partial.profil')
    @else
        {{-- Contenu par défaut (Accueil du dashboard) --}}
        <p>Sélectionnez une option dans le menu à gauche pour gérer vos rendez-vous ou votre profil.</p>
    @endif

@endsection