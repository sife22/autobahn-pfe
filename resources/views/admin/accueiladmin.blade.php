@extends('admin.layoutadmin')
@section('title', 'Autosif - Admin')
@section('style')    
<link rel="stylesheet" href="/style/accueiladmin.css" type="text/css"/>
@endsection 
@section('content')
<div>
    <div>
        <h1 class="titre">Bienvenu M. {{ $data->prenom }}</h1>
    </div>
    <br>
    @if(session()->has('supprimervoiture'))
        <h3 class="suppression">{{ Session()->get('supprimervoiture') }}</h3>
    @endif
    @if(session()->has('erreursupprimer'))
        <h3 class="erreursupprimer">{{ Session()->get('erreursupprimer') }}</h3>
    @endif
    <div class="div_voitures">
        @foreach ($voitures as $voiture)
        <div class="div_voiture">
          <div class="div_image">
            <img src="/images/voitures/{{ $voiture->image }}" alt="{{ $voiture->image }}">
          </div>
          <div class="div_details">
            <h2 class="marque">{{ $voiture->marque }} {{ $voiture->modele }} </h2>
            <p>Année : {{ $voiture->annee }}</p>
            <p>Carburation : {{ $voiture->carburation }}</p>
            <p>Transmission : {{ $voiture->transmission }}</p>
            <p class="prix">{{ $voiture->prix }}DH/jour</p>
          </div>
          <div class="div_button">
            <a href="voiture/modifier/{{ $voiture->matricule }}"><button class="modifier">Modifier</button></a>
            <a href="voiture/supprimer/{{ $voiture->matricule }}"><button class="supprimer">Supprimer la voiture</button></a>
          </div>
        </div>
          @endforeach
      </div>
</div>
@endsection