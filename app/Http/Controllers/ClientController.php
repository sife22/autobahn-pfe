<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Reservation;
use App\Models\Voiture;
use DateTime;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;

class ClientController extends Controller
{

    // ============= page connexion de client =====================
    public function index(){
        return view('client.connexion');
    }
    // ===========================================================

    // ================== page d'inscription ======================
    public function create(){
        return view('client.inscription');
    }
    // ============================================================

    // ================== page profile ======================
    public function profile(Request $request){
        $data = array();
        $data = Client::find(session()->get('clientId'));
        return view('client.accueilclient')->with('data', $data);
    }
    // ============================================================

    // =============== login client ===========================
    public function loginClient(Request $request){
        $email = $request['email'];
        $password = $request['password'];

        $validateData = $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'le email est obligatoire',
            'password.required'=>'le mot de passe est obligatoire',
        ]);
        
        $client = Client::where('email', '=', $validateData['email'])->where('password', '=', $validateData['password'])->first();
        if($client){
            $request->session()->put('clientId', $client->id);
            return redirect('/accueilclient');
        }else{
            session()->flash('failed', 'Vous êtes pas un client!');
            return redirect()->back()->onlyInput('email', 'password');

        }
    }
    // ====================================================================
    // ================= log Out ============================
        public function logOut(){
            if(session()->has('clientId')){
                session()->pull('clientId');
                return redirect('/connexion');
            }
        }
    // ===================================================

    // ================== Ajouter un client =======================
    public function storeUser(Request $request){
        $validateData = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'cin' => 'required|min:5|unique:clients,cin',
            'tel' => 'required|min:8',
            'numero_permis' => 'required|min:5',
            'date_permis' => 'required',
            'email' => 'required',
            'password' => 'required',
        ], 
        [
            'nom.required' => '*Le nom est obligatoire.',
            'prenom.required' => '*Le prenom est obligatoire.',
            'cin.required' => '*La CIN est obligatoire.',
            'cin.unique' => '*Année de fabrication est obligatoire.',
            'tel.required' => '*le tél est obligatoire.',
            'tel.min' => '*le tél doit être composé par 8 chiffres au moins.',
            'tel.integer' => '*le tél doit être un nombre.',
            'numero_permis.required' => '*Le numero du permis est obligatoire.',
            'date_permis.required' => '*La date du permis du permis est obligatoire.',
            'email.required' => '*Le email est obligatoire.',
            'password.required' => '*Le password est obligatoire.',
        ]);
        if($validateData){
        $client = new Client();
        $client->nom = $validateData['nom'];
        $client->prenom = $validateData['prenom'];
        $client->cin = $validateData['cin'];
        $client->tel = $validateData['tel'];
        $client->numero_permis = $validateData['numero_permis'];
        $client->date_permis = $validateData['date_permis'];
        $client->date_inscription = date('Y-m-d');
        $client->email= $validateData['email'];
        $client->password= $validateData['password'];
        $client->save();
        session()->flash('successSignin', 'Vous avez créer un compte avec succes!');
        return redirect("/connexion");
    }else{
        return redirect()->back()->withErrors($validateData)->withInput();
    }      
}
    // ============================================================

    // ================ Reservation ============================
    public function reservations(){
        $client = Client::find(session()->get('clientId'));
        $voituresReservees = $client->reservation->map(function($reservation){
            return [$reservation->voiture, $reservation];
        });
        // $voituresReservees = Client::with('reservation')->find(session()->get('clientId'));
        // dd($voituresReservees)
        return view('client.reservations')->with(['voitures'=> $voituresReservees]);
    }
    // ======================================================

    
}
