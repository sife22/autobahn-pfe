<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Plateforme pour gérer la location de voitures
Cette application web est développée en utilisant le framework Laravel et permet de gérer la location de voitures pour une agence spécifique.

## Acteurs & Fonctionnalités 
- Visiteur : 
   - Explorer l'intégralité de la plateforme.
   - Pour accéder aux informations détaillées d'une voiture, il est nécessaire de se connecter.
   - Créer un compte.
   - Laisser un message via le formulaire Contactez-nous.

- Admin : 
   - Authentification en utilisant les sessions. (Se connecter, Se déconnecter)
   - Gestion de voitures.
      - Voir toutes les voitures de l'agence.
      - Modifier une voiture.
      - Supprimer une voiture.
   - Recevoir les messages des clients par e-mail.

- Client :
   - Authentification en utilisant les sessions. (Se connecter, Se déconnecter)
   - Explorer toutes les voitures et leurs spécificités.
   - Réserver une voiture si elle est disponible.
   - Voir ses réservations.
   - Annuler une réservation.

## Fonctionnalités à ajouter...
- Gestion des réservations par l'administrateur.
- Gestion des clients.
- Traitement des factures en ligne.
- Pourquoi ne pas effectuer le paiement en ligne!...


## Configuration requise
- PHP 8.0 ou supérieur
- Composer
- Base de données (MySQL)
- Serveur web (Apache, Nginx, etc.)

## Installation
1. Clonez le dépôt Git :
   git clone https://github.com/sife22/autobahn-pfe.git

2. Accédez au répertoire du projet :
   cd autobahn-pfe

3. Installez les dépendances avec Composer :
   composer install

4. Copiez le fichier '.env.example' vers '.env' et configurez les paramètres de connexion à la base de données via la commande suivante :
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

## ...


