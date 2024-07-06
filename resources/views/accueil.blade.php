@extends('layout')
@section('title', 'AUTOBAHN')    
@section('style')    
<link rel="stylesheet" href="/style/accueil.css" type="text/css"/>
@endsection
@section('content')    
<div class="header">
    {{-- <h1>Bienvenu sur le meilleur site <br> de location de voitures <br> au Maroc</h1> --}}
</div>
<div class="div_mission">
    <div class="mission">
        <h5 class="titre">Qui sont nous?</h5>
        <p class="para_mission">
            "Bienvenue chez AUTOBAHN, l'agence de location de voitures à ne pas manquer!
            Nous sommes heureux de vous proposer une large gamme de véhicules pour répondre à tous vos besoins de déplacement.
            Peu importe si vous cherchez une voiture pour un voyage d'affaires, une escapade en famille ou pour explorer une nouvelle ville, nous avons ce qu'il vous faut.
            Nous nous assurons que tous nos véhicules sont régulièrement entretenus et vérifiés pour garantir votre sécurité et votre confort.
            En outre, nous proposons des tarifs compétitifs et des options de location flexibles pour s'adapter à votre budget et à votre emploi du temps..."
        </p>
    </div>
    <div class="fondateurs">
      <div>
        {{-- <img src="" class="" alt="" /> --}}
        <h1>Sif eddine HADI</h1>
        <h2>CEO</h2>
        <p>
          "Bienvenue chez AUTOBAHN, Je suis fier d'avoir fondé cette agence et de vous fournir ce service."
        </p>
      </div>
      
    </div>
  </div>
<div class="garantie">
    <div class="div_garantie">
      <img src="/garantie/garantie.png" alt="" class="img_garantie" />
      <h2>3 jours pour décider.</h2>
      <p>
        Vous avez 3 jours pour lequel
        <br /> vous pouvez annuler une réservation
      </p>
    </div>
    <div class="div_garantie">
      <img src="/garantie/garantie.png" alt="" class="img_garantie" />
      <h2>AUTOBAHN assure la qualité.</h2>
      <p>
        Chaque voiture a été inspecté <br /> minutieusement
      </p>
    </div>
    <div class="div_garantie">
      <img src="/garantie/garantie.png" alt="" class="img_garantie" />
      <h2>+50 Voitures.</h2>
      <p>
        Notre agence offre plus que <br />
        50 Voitures en meilleur état
      </p>
    </div>
  </div>
  <div>
    <h1 class="nosvoitures">Nos voitures</h1>
      <div class="div_voitures">
          @foreach ($voitures as $voiture)
          <div class="div_voiture"> 
            <div class="div_image_voiture">
              <img src="/images/voitures/{{ $voiture->image }}" alt="{{ $voiture->image }}"> 
            </div>
            <div class="div_details_voiture">
              <h2 class="marque">{{ $voiture->marque }} {{ $voiture->modele }}  </h2>
              <p>Année : {{ $voiture->annee }}</p>
              <p>Carburation :{{ $voiture->carburation }}</p>
              <p>Boite vitesse : {{ $voiture->transmission }}</p>
              <p class="prix">Prix : {{ $voiture->prix }} DH/jour</p>
              <div class="div_button">
                  
                  
                  <a href="/nosvoitures/details/{{ $voiture->matricule }}"><button>Voir Plus</button></a>
              </div>
            </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection