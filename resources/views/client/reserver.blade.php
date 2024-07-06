@extends('client.layoutclient')
@section('title', 'Réserver')    
@section('style')    
<link rel="stylesheet" href="/style/reserver.css" type="text/css"/>
@endsection
@section('content')
<div class="div_reserver">
    <form action="/storeReservation/{{ $client->id }}/{{ $voiture->matricule }}" method="post">
        <h1>Réserver {{ $voiture->marque }} {{ $voiture->modele }}</h1>
        @csrf
        <div>
            <label for="">Date départ : <input type="date" name="date_depart"/></label>
        </div>
        <div>
            <label for="">Date retour : <input type="date" name="date_retour"/></label>
        </div>
        <input type="submit" value="Valider la réservation" class="reserver_button">
    </form>
</div>
@endsection