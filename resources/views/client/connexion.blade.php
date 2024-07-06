@extends('layout')
@section('title', 'Connexion')    
@section('style')    
<link rel="stylesheet" href="/style/connexion.css" type="text/css"/>
@endsection
@section('content')    
<div class="div_connexion">

    <form action="/loginClient" method="post" class="form_connexion">
        @csrf
        <div>
          <h1 class="form_title">Connexion</h1>
        </div>
        <br />
        @if(session()->has('middle'))
        <h3 class="erreur">{{ Session()->get('middle') }}</h3>
        @endif
        @if(session()->has('successSignin'))
        <h3 class="succes">{{ Session()->get('successSignin') }}</h3>
        @endif
        <br />
        <div>
          <label>
            Email : <br />
            <input type="email" name="email" placeholder="Email :" />
          </label>
          
          @if ($errors->has('email'))
          <div class="erreur">{{ $errors->first('email') }}</div>
          @endif
        </div>
        <br />
        <div>
          <label>
            Mot de passe : <br />
            <input type="password" name="password" placeholder="Mot de passe :" />
          </label>
          @if($errors->has('password'))
            <div class="erreur">{{ $errors->first('password') }}</div>
          @endif
        </div>
        <br />
        <div>
          <input
            type="submit"
            name="login"
            value="Se connecter"
            class="login"
          />
        </div>
        <br>
        @if(session()->has('failed'))
        <h3 class="erreur">{{ Session()->get('failed') }}</h3>
        @endif
        <br />
        </div>
      </form>
    </div>
@endsection
