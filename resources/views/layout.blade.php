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
      <h2>AUTOBAHN</h2>
    </div>
    <div>
      <ul class="ul_links">
        <li class="li_link">
          <a href="/" class="a_link">
            Accueil
          </a>
        </li>
        <li class="li_link">
          <a href="/nosvoitures" class="a_link">
            Nos voitures
          </a>
        </li>
        <li class="li_link">
          <a href="/contacteznous" class="a_link">
            Contactez-nous
          </a>
        </li>
      </ul>
    </div>
    <div class="div_auth">
      <a href="/inscription" class="a_inscription">
        Inscription
      </a>
      <a href="/connexion" class="a_connexion">
        Connexion
      </a>
    </div>
  </div>
    @yield('content')
   <div class="footer">
      <div class="div_contact_links">
        <div class="div_contact">
          <h1>Contact :</h1>
          <h3>sifeddinehadi22@gmail.com</h3>
          <h3>+212 669 08 44 87</h3>
          <h3>Adress : Rabat Salé Kénitra</h3>
          <h3>©2023. AUTOBAHN - Tous droits réservés</h3>
          
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
            <br />
            <li class="li_link_footer">
              <a href="/inscription" class="a_link_footer_inscription">
                Inscription
              </a>
            </li>
            <li class="li_link_footer">
              <a href="/connexion" class="a_link_footer_connexion">
                Connexion
              </a>
            </li>
            <li class="li_link_footer">
              <a href="/connexionadmin" class="a_link_footer_connexion">
                Admin
              </a>
            </li>
          </ul>
        </div>
      </div>
      <br />
      <br />
      <div class="div_media">
        <a href="#" class="a_media">
          <img src="logos/facebook.png" alt="" class="img_media" />
        </a>
        <a href="#" class="a_media">
          <img src="logos/instagram.png" alt="" class="img_media" />
        </a>
        <a href="#" class="a_media">
          <img src="logos/twitter.png" alt="" class="img_media" />
        </a>
        <a href="#" class="a_media">
          <img src="logos/youtube.png" alt="" class="img_media" />
        </a>
      </div>
    </div>
    
</body>
</html>