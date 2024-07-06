@extends('client.layoutclient')
@section('title', 'Autosif')
@section('style')
<link rel="stylesheet" href="/style/details.css" type="text/css"/>
@endsection
@section('content')
<div class="div_nosvoitures">
    <br>
    @if(count($voitures)===0)
    <h2 class="notfoundcars">Pas de voitures avec ces conditions <br><a href="/nosvoitures" class="back">Retour</a></h2>
    @endif

    @if (count($voitures)>0)

    <h1 class="marques_title">Les voitures pour vos conditions :</h1>
    <br>
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
                <a href="/nosvoitures/details/{{ $voiture->matricule }}" ><input type="submit" value="Voir plus" class="reserver_button"></a>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
</div>
@endsection
