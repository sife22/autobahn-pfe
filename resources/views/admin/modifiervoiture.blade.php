@extends('admin.layoutadmin')
@section('title', 'Modifier')    
@section('style')    
<link rel="stylesheet" href="/style/modifiervoiture.css" type="text/css"/>
@endsection
@section('content') 
    <div class="div_modification">
        <form action="/updateCar/{{ $voiture->matricule }}" method="post" class="form_voiture">
            @method('PUT')
            @csrf
          <div>
            <h1 class="form_title">Modifier {{ $voiture->marque }} {{ $voiture->modele }}</h1>
          </div>
          <br />
          <div>
            <label>
              Matricule : <br />
              <input type="text" name="matricule" placeholder="Matricule :" readonly class="input_inscription" value="{{ $voiture->matricule }}" />
            </label>
          </div>
          @if ($errors->has('matricule'))
          <div class="erreur">{{ $errors->first('matricule') }}</div>
          @endif
          <br />
          <div>
            <label>
              Marque : <br />
              <input type="text" name="marque" placeholder="Marque :"  class="input_inscription" value="{{ $voiture->marque }}" />
            </label>
          </div>
          @if ($errors->has('marque'))
          <div class="erreur">{{ $errors->first('marque') }}</div>
          @endif
          <br />
  
          <div>
            <label>
              Modèle : <br />
              <input type="text" name="modele" placeholder="Modele :"  class="input_inscription"  value="{{ $voiture->modele }}"/>
            </label>
          </div>
          @if ($errors->has('modele'))
          <div class="erreur">{{ $errors->first('modele') }}</div>
          @endif
          <br />
  
          <div>
            <label>
              Année : <br />
              <input
                type="number"
                name="annee"
                placeholder="Année :"
              class="input_inscription" value="{{ $voiture->annee }}" />
            </label>
          </div>
          @if ($errors->has('annee'))
          <div class="erreur">{{ $errors->first('annee') }}</div>
          @endif
          <br />
  
          <div>
            <label>
              Capacité habitacle : <br />
              <input
                type="text"
                name="capacite_habitacle"
                placeholder="Capacite habitacle :"
              class="input_inscription"  value="{{ $voiture->capacite_habitacle }}"/>
            </label>
          </div>
          @if ($errors->has('capacite_habitacle'))
          <div class="erreur">{{ $errors->first('capacite_habitacle') }}</div>
          @endif
          
          <br />
          <div>
            <label>
              Carburation : <br />
              <input
                type="text"
                name="carburation"
                placeholder="Carburation :"
              class="input_inscription"  value="{{ $voiture->carburation }}"/>
            </label>
          </div>
          @if ($errors->has('carburation'))
          <div class="erreur">{{ $errors->first('carburation') }}</div>
          @endif
          <br />
          <div>
            <label>
              Transmission : <br />
              <input
                type="text"
                name="transmission"
                placeholder="Transmission :"
             class="input_inscription"  value="{{ $voiture->transmission }}" />
            </label>
          </div>
          @if ($errors->has('transmission'))
          <div class="erreur">{{ $errors->first('transmission') }}</div>
          @endif
          <br />
          <div>
            <label>
              Prix par jour : <br />
              <input
                type="number"
                name="prix"
                placeholder="Prix :"
              class="input_inscription"  value="{{ $voiture->prix }}"/>
            </label>
          </div>
          @if ($errors->has('prix'))
          <div class="erreur">{{ $errors->first('prix') }}</div>
          @endif
          <br />
          <div>
            <label>
              Compteur : <br />
              <input
                type="number"
                name="compteur_km"
                placeholder="Compteur :"
              class="input_inscription"  value="{{ $voiture->compteur_km }}"/>
            </label>
          </div>
          @if ($errors->has('compteur_km'))
          <div class="erreur">{{ $errors->first('compteur_km') }}</div>
          @endif
          <br />
          {{-- <div>
            <label>
              Image : <br />
              <input
                type="file"
                name="image"
                class="input_inscription"  value="{{ $voiture->image }}"/>
            </label>
          </div>
          @if ($errors->has('image'))
          <div class="erreur">{{ $errors->first('image') }}</div>
          @endif --}}
          <br />
          <div>
            <input
              type="submit"
              name="modifier"
              value="Modifier la voiture"
              class="modifier"
            />
          </div>
          
         
        </form>
        </div>
@endsection