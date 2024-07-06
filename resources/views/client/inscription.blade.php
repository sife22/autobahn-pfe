@extends('layout')
@section('title', 'Inscription')    
@section('style')    
<link rel="stylesheet" href="/style/inscription.css" type="text/css"/>
@endsection
@section('content')    
    <div class="div_inscription">
        <form action="storeUser" method="post" class="form_inscription">
            @csrf
          <div>
            <h1 class="form_title">Créer votre compte</h1>
          </div>
          <br />
          <div>
            <label>
              Nom : <br />
              <input type="text" name="nom" placeholder="Nom :"  class="input_inscription" value="{{ old('nom') }}" />
            </label>
          </div>
          @if ($errors->has('nom'))
          <div class="erreur">{{ $errors->first('nom') }}</div>
          @endif
          <br />
          <div>
            <label>
              Prénom : <br />
              <input type="text" name="prenom" placeholder="Prenom :"  class="input_inscription" value="{{ old('prenom') }}" />
            </label>
          </div>
          @if ($errors->has('prenom'))
          <div class="erreur">{{ $errors->first('prenom') }}</div>
          @endif
          <br />
  
          <div>
            <label>
              Tél : <br />
              <input type="text" name="tel" placeholder="Numéro :"  class="input_inscription"  value="{{ old('tel') }}"/>
            </label>
          </div>
          @if ($errors->has('tel'))
          <div class="erreur">{{ $errors->first('tel') }}</div>
          @endif
          <br />
  
          <div>
            <label>
              CIN : <br />
              <input
                type="text"
                name="cin"
                placeholder="CIN :"
              class="input_inscription" value="{{ old('cin') }}" />
            </label>
          </div>
          @if ($errors->has('cin'))
          <div class="erreur">{{ $errors->first('cin') }}</div>
          @endif
          <br />
  
          <div>
            <label>
              Numéro de permis : <br />
              <input
                type="text"
                name="numero_permis"
                placeholder="Numero de permis :"
              class="input_inscription"  value="{{ old('numero_permis') }}"/>
            </label>
          </div>
          @if ($errors->has('numero_permis'))
          <div class="erreur">{{ $errors->first('numero_permis') }}</div>
          @endif
          
          <br />
          <div>
            <label>
              Date de permis : <br />
              <input
                type="date"
                name="date_permis"
                placeholder="Date de permis :"
              class="input_inscription"  value="{{ old('date_permis') }}"/>
            </label>
          </div>
          @if ($errors->has('date_permis'))
          <div class="erreur">{{ $errors->first('date_permis') }}</div>
          @endif
          <br />
          <div>
            <label>
              Email : <br />
              <input
                type="email"
                name="email"
                placeholder="Email :"
             class="input_inscription"  value="{{ old('email') }}" />
            </label>
          </div>
          @if ($errors->has('email'))
          <div class="erreur">{{ $errors->first('email') }}</div>
          @endif
          <br />
          <div>
            <label>
              Mot de passe : <br />
              <input
                type="password"
                name="password"
                placeholder="Mot de passe :"
              class="input_inscription"  value="{{ old('password') }}"/>
            </label>
          </div>
          @if ($errors->has('password'))
          <div class="erreur">{{ $errors->first('password') }}</div>
          @endif
          <br />
          <div>
            <input
              type="submit"
              name="signin"
              value="Créer un compte"
              class="signin"
            />
          </div>
          <br>
          <div>
            <a href="/connexion" class="connexion">
              j'ai déja un compte!
            </a>
          </div>
          
          
        </form>
    </div>
@endsection