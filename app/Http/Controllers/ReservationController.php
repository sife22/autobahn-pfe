<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Reservation;
use App\Models\Voiture;
use DateTime;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    
    // ============================== Page de reservation ==============================
    public function index($id, $matricule){
        $client = Client::find($id);
        $voiture = Voiture::find($matricule);
        return view('client.reserver')->with(['voiture'=> $voiture, 'client'=>$client]);
    }
    // ===================================================================================

    // ============================== Sauvgarder une réservation ==============================
    public function storeReservation(Request $request, Client $id, Voiture $matricule){
        $voiture = Voiture::find($matricule->matricule);

        $date_depart = new DateTime($request['date_depart']);
        $date_retour = new DateTime($request['date_retour']);

        $reservation = new Reservation();
        $reservation->date_depart = $date_depart->format('Y-m-d');
        $reservation->date_retour = $date_retour->format('Y-m-d');
        $reservation->duree = date_diff($date_depart, $date_retour)->days;
        $reservation->montant = ($voiture->prix)*(date_diff($date_depart, $date_retour)->days);
        $reservation->client_id = $id->id;
        $reservation->voiture_matricule = $matricule->matricule;
        // ==== dispo de la voiture ====
        $voiture->disponibilite = false;
        $voiture->save();
        $reservation->save();
        
        return redirect('/reservations');
    }
    // ==========================================================================================

    // ================ Annulation ============================
    public function annuler($id){
        $voitureRes = Reservation::all()->where('voiture_matricule', '=', $id)->first();
        $voitureVoi = Voiture::find($id);
        $voitureVoi->disponibilite = true;
        $voitureVoi->save();
        $voitureRes->delete();
        return redirect()->back();
    }
    // ======================================================
}
