@extends('layout')
@section('title', 'Contactez nous')    
@section('style')    
<link rel="stylesheet" href="/style/contacteznous.css" type="text/css"/>
@endsection
@section('content')    
    <div class="div_contacteznous">
        <form action="storeMessage" method="post" class="form_contacteznous">
            @csrf
          <div>
            <h1 class="form_title">Contactez nous</h1>
          </div>
          <br />
          <div>
            <label>
              Nom : <br />
              <input type="text" name="nom" placeholder="Nom :"  class="input_contacteznous" value="{{ old('nom') }}" />
            </label>
          </div>
          @if ($errors->has('nom'))
          <div class="erreur">{{ $errors->first('nom') }}</div>
          @endif
          
          
          
          <br />
          <div>
            <label>
              Tél : <br />
              <input type="tel" name="tel" placeholder="Téléphone :"  class="input_contacteznous" value="{{ old('tel') }}" />
            </label>
          </div>
          @if ($errors->has('tel'))
          <div class="erreur">{{ $errors->first('tel') }}</div>
          @endif
          <br>
  
         
          <div>
            <label>
              Email : <br />
              <input
                type="email"
                name="email"
                placeholder="Email :"
             class="input_contacteznous"  value="{{ old('email') }}" />
            </label>
          </div>
          @if ($errors->has('email'))
          <div class="erreur">{{ $errors->first('email') }}</div>
          @endif
          <br />
          <div>
            <label>
              Votre message : <br />
              <textarea
                type="text"
                name="message"
                placeholder="Votre message :"
              class="input_contacteznous"  value="{{ old('message') }}"></textarea>
            </label>
          </div>
          @if ($errors->has('message'))
          <div class="erreur">{{ $errors->first('message') }}</div>
          @endif
          <br />
          <div>
              <input
              type="submit"
              name="send"
              value="Envoyer le message"
              class="envoyer"
              />
            </div>
            <br>
            @if(session()->has('success'))
          <h3 class="success">{{ Session()->get('success') }}</h3>
          @endif
        </form>
    </div>
@endsection