@extends('client.layoutclient')
@section('title', 'Autosif - Détails')
@section('style')    
<link rel="stylesheet" href="/style/details.css" type="text/css"/>
@endsection 
@section('content')
<div>
    <br>
    <h1 class="vos_reservations">{{ $voiture->marque }} {{ $voiture->modele }}</h1>
    <br>
    <div class="div_voitures">
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

          @if($voiture->disponibilite === 0)
                  <h3 class="disponibilite">Pas disponible pour le moment</h3>
                  @foreach ($ifreserved as $item)
                      <h3 class="disponibilite">Elle va être disponible à : {{ $item[1]->date_retour }}</h3>
                  @endforeach
                  {{-- <input type="submit" value="Cette {{ $voiture->marque }} est pas disponible" readonly> --}}
                  @else
                <div class="div_button">
                    <a href="/nosvoitures/reserver/{{ $client }}/{{ $voiture->matricule }}"><input type="submit" value="Réresrver cette {{ $voiture->marque }}"></a>
                </div>
            @endif
                         
        </div>
      </div>
  </div>
</div>
@endsection