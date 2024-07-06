<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Plateforme de Gestion de Location de Voitures
Cette application web est développée en utilisant le framework Laravel et permet de gérer la location de voitures pour une agence spécifique.

## Fonctionnalités
- Gestion des voitures (ajout, modification, suppression)
- Gestion des clients (ajout, modification, suppression)
- Gestion des locations (réservation, retour, facturation)
- Authentification des utilisateurs (administrateurs, agences, clients)
- Système de notifications (email, etc.)

## Configuration requise
- PHP 8.0 ou supérieur
- Composer
- Base de données (MySQL)
- Serveur web (Apache, Nginx, etc.)

## Installation
1. Clonez le dépôt Git :
   git clone https://github.com/votre-utilisateur/location-voitures.git

2. Accédez au répertoire du projet :
   cd autobahn-pfe

3. Installez les dépendances avec Composer :
   composer install

4. Copiez le fichier '.env.example' vers '.env' et configurez les paramètres de connexion à la base de données :
   cp .env.example .env

5. Générez la clé d'application Laravel :
   php artisan key:generate

6. Exécutez les migrations pour créer les tables de la base de données :
   php artisan migrate

7. Démarrez le serveur de développement :
   php artisan serve

8. Accédez à l'application dans votre navigateur à l'adresse 'http://localhost:8000'.

## Quelques captures d'écran

1. ## Espace visiteur
<p align="center"><a href="#" target="_blank"><img src="./screenshots/1.png" width="90%" alt="App"></a></p>
<p align="center"><a href="#" target="_blank"><img src="./screenshots/2.png" width="90%" alt="App"></a></p>
<p align="center"><a href="#" target="_blank"><img src="./screenshots/3.png" width="90%" alt="App"></a></p>
<p align="center"><a href="#" target="_blank"><img src="./screenshots/4.png" width="90%" alt="App"></a></p>
<p align="center"><a href="#" target="_blank"><img src="./screenshots/5.png" width="90%" alt="App"></a></p>
Page Nos voitures
<p align="center"><a href="#" target="_blank"><img src="./screenshots/10.png" width="90%" alt="App"></a></p>
Page Contactez-nous
<p align="center"><a href="#" target="_blank"><img src="./screenshots/11.png" width="90%" alt="App"></a></p>
Page Connexion
<p align="center"><a href="#" target="_blank"><img src="./screenshots/12.png" width="90%" alt="App"></a></p>
Page Inscription
<p align="center"><a href="#" target="_blank"><img src="./screenshots/13.png" width="90%" alt="App"></a></p>

2. ## Espace administrateur
<p align="center"><a href="#" target="_blank"><img src="./screenshots/6.png" width="90%" alt="App"></a></p>
<p align="center"><a href="#" target="_blank"><img src="./screenshots/7.png" width="90%" alt="App"></a></p>
<p align="center"><a href="#" target="_blank"><img src="./screenshots/8.png" width="90%" alt="App"></a></p>
<p align="center"><a href="#" target="_blank"><img src="./screenshots/9.png" width="90%" alt="App"></a></p>


