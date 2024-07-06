<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\UserController;
use App\Models\Client;
use App\Models\Voiture;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/inscription', [ClientController::class, 'create'])->middleware('alreadylogged');
Route::post('/storeUser', [ClientController::class, 'storeUser']);

Route::get('/connexion', [ClientController::class, 'index'])->middleware('alreadylogged');
Route::post('/loginClient', [ClientController::class, 'loginClient']);
Route::get('/accueilclient', [ClientController::class, 'profile'])->middleware('havetolog');
Route::get('/logOut', [ClientController::class, 'logOut']);

Route::get('/connexionadmin', [UserController::class, 'index'])->middleware('alreadyloggedadmin');
Route::post('/loginAdmin', [UserController::class, 'loginAdmin']);
Route::get('/accueiladmin', [UserController::class, 'profile'])->middleware('havetologadmin');

Route::get('/logoutAdmin', [UserController::class, 'logoutAdmin']);

Route::get('/', [VoitureController::class, 'accueil'])->middleware('alreadylogged');
Route::get('/nosvoitures', [VoitureController::class, 'index']);
Route::post('filterCar', [VoitureController::class, 'filterCar'])->middleware('havetolog');
Route::get('/nosvoitures/details/{matricule}', [VoitureController::class, 'showCar'])->middleware('havetolog');

Route::get('/contacteznous', [MessageController::class, 'index']);
// Route::post('/storeMessage', [MessageController::class, 'storeMessage']);
Route::post('/storeMessage', [MessageController::class, 'sendMessage']);



Route::get('/nosvoitures/reserver/{id}/{matricule}', [ReservationController::class, 'index'])->middleware('havetolog');
Route::post('/storeReservation/{id}/{matricule}', [ReservationController::class, 'storeReservation'])->middleware('havetolog');

Route::get('/reservations', [ClientController::class, 'reservations'])->middleware('havetolog');
Route::get('/reservation/annulation/{matricule}', [ReservationController::class, 'annuler'])->middleware('havetolog');

Route::get('/createcar', [VoitureController::class, 'create'])->middleware('havetologadmin');
Route::post('/storeCar', [VoitureController::class, 'storeCar'])->middleware('havetologadmin');

Route::get('/voiture/modifier/{matricule}', [VoitureController::class, 'editCar'])->middleware('havetologadmin');
Route::put('/updateCar/{matricule}', [VoitureController::class, 'updateCar'])->middleware('havetologadmin');
Route::get('/voiture/supprimer/{matricule}', [VoitureController::class, 'deleteCar'])->middleware('havetologadmin');


