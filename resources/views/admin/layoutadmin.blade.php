<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('style')
    <link rel="stylesheet" href="/style/layoutadmin.css">
    <link rel="shortcut icon" href="https://cdn3.vectorstock.com/i/1000x1000/87/02/auto-car-logo-template-icon-vector-21468702.jpg" type="image/x-icon">
</head>
<body>
  <div class="navbar">
    <div>
      <h2><a href="/accueiladmin" style="color: black; text-decoration:none">AUTOBAHN</a></h2>
    </div>
    <div>
      <ul class="ul_links">
        <li class="li_link">
          <a href="/createcar" class="a_link">
            Ajouter une voiture
          </a>
        </li>
      </ul>
    </div>
    <div class="div_auth">
      <a href="/logoutAdmin" class="a_sedeconnecter">
        Se déconnecter
      </a>
    </div>
  </div>
    @yield('content')
    </div>
</body>
</html>