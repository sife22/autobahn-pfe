@extends('client.layoutclient')
@section('title', 'Autosif - Mes Réservations')
@section('style')    
<link rel="stylesheet" href="/style/details.css" type="text/css"/>
@endsection 
@section('content')
<div>
    @if (count($voitures)===0)
        <h1 class="vos_reservations">Vous avez aucune réservation!</h1>    
    @else
    <h1 class="vos_reservations">Vos réservations : </h1>
    <div class="div_voitures">
      @foreach ($voitures as $voiture)
        <div class="div_voiture">
          <div class="div_image">
            <img src="/images/voitures/{{ $voiture[0]->image }}" alt="{{ $voiture[0]->image }}">
          </div>
          <div class="div_details">
            <h2 class="marque">{{ $voiture[0]->marque }} {{ $voiture[0]->modele }} </h2>
            <p>Année : {{ $voiture[0]->annee }}</p>
            <p>Carburation : {{ $voiture[0]->carburation }}</p>
            <p>Transmission : {{ $voiture[0]->transmission }}</p>
            <p class="prix">{{ $voiture[0]->prix }}DH/jour</p>
            <p>Date de prendre du véhicule : {{ $voiture[1]->date_depart }}</p>
            <p>Date de restitution du véhicule : {{ $voiture[1]->date_retour }}</p>
            <p class="prix">Montant total à payer : {{ $voiture[1]->montant }} DH</p>
            
          </div>
          <div class="div_button">
            <a href="/reservation/annulation/{{ $voiture[0]->matricule }}"><input type="submit" value="Annuler" /></a>
          </div>
        </div>
      @endforeach
      </div>
  </div>
  @endif
</div>
@endsection