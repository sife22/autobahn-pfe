@extends( session()->has('clientId') === true ? 'client.layoutclient' : 'layout')
@section('title', 'Autosif - Nos voitures')    
@section('style')    
<link rel="stylesheet" href="/style/nosvoitures.css" type="text/css"/>
@endsection
@section('content')  
<div class="div_nosvoitures">  
    <h1 class="title">Consulter Nos voitures</h1>
    <br>
    <form action="filterCar" method="POST">
        @csrf
        <select name="marque">
            <option disabled selected> -- Rechercher par marque -- </option>
            @foreach($marques as $marque)
            <option value="{{ $marque->marque }}" name='marque'>{{ $marque->marque }}</option>
            @endforeach
        </select>
        <select name="prix">
            <option disabled selected> -- Rechercher par prix max -- </option>
            <option value="100" name='marque'>100 dh</option>
            <option value="200" name='marque'>200 dh</option>
            <option value="300" name='marque'>300 dh</option>
            <option value="400" name='marque'>400 dh</option>
            <option value="500" name='marque'>500 dh</option>
        </select>
        <select name="carburation">
            <option disabled selected> -- Rechercher par carburation -- </option>
            @foreach($carburations as $carburation)
            <option value="{{ $carburation->carburation }}" name='marque'>{{ $carburation->carburation }}</option>
            @endforeach
        </select>
        <input type="submit" value="Rechercher" />
    </form>
    <br>
    <div>
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
                  <a href="/nosvoitures/details/{{ $voiture->matricule }}"><button>Voir plus</button></a>
                </div>
              </div>
                @endforeach
            </div>
        </div>
    
</div>
@endsection