<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('style')
    <link rel="stylesheet" href="/style/layout.css">
    <link rel="shortcut icon" href="https://cdn3.vectorstock.com/i/1000x1000/87/02/auto-car-logo-template-icon-vector-21468702.jpg" type="image/x-icon">
</head>
<body>
    <div class="navbar">
        <div>
          <h2 class="client">Bonjour M.{{ App\Models\Client::find(session()->get('clientId'))->prenom;}}</h2>
        </div>
        <div>
          <ul class="ul_links">
            <li class="li_link">
              <a href="/accueilclient" class="a_link">
                Accueil
              </a>
            </li>
            <li class="li_link">
              <a href="/nosvoitures" class="a_link">
                Nos voitures
              </a>
            </li>
            {{-- <li class="li_link">
              <a href="/contacteznous" class="a_link">
                Contactez-nous
              </a>
            </li> --}}
          </ul>
        </div>
        <div class="div_auth">
            <a href="/reservations" class="a_reservation">
                Mes réservations
              </a>
          <a href="/logOut" class="a_sedeconnecter">
            Se déconnecter
          </a>
        </div>
      </div>
    @yield('content')
    <div class="footer">
      <div class="div_contact_links">
        <div class="div_contact">
          <h1>Contact :</h1>
          <h3>CONTACT@AUTOSIF.COM</h3>
          <h3>+212 669 08 44 87 / +212 615 27 05 96 </h3>
          <h3>Adress : Salé, Rabat</h3>
          <h3>©2023. AUTOSIF - Tous droits réservés</h3>
        </div>
        <div class="div_links_footer">
          <ul class="ul_links_footer">
            <li class="li_link_footer">
              <a href="/nosvoitures" class="a_link_footer">
                Nos voitures
              </a>
            </li>
            <li class="li_link_footer">
              <a href="/contacteznous" class="a_link_footer">
                Contactez-nous
              </a>
            </li>            
          </ul>
        </div>
      </div>
      <br />
      <br />
      <div class="div_media">
        <a href="0" class="a_media">
          <img src="logos/facebook.png" alt="" class="img_media" />
        </a>
        <a href="0" class="a_media">
          <img src="logos/instagram.png" alt="" class="img_media" />
        </a>
        <a href="0" class="a_media">
          <img src="logos/twitter.png" alt="" class="img_media" />
        </a>
        <a href="0" class="a_media">
          <img src="logos/youtube.png" alt="" class="img_media" />
        </a>
      </div>
    </div>

</body>
</html>