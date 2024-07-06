<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VoitureController extends Controller
{
    // ============== page tous les voitures ===========================
    public function index(){
        $voitures = Voiture::all();
        $marques = Voiture::distinct()->orderBy('marque', 'ASC')->get('marque');
        $carburations = Voiture::distinct()->get('carburation');
        return view('client.nosvoitures')->with(['voitures'=>$voitures , 'marques'=>$marques, 'carburations'=>$carburations]);
    }
    // ===============================================================

    // ============== pour la page d'accueil ===========================
    public function accueil(){
        $voitures = Voiture::take(5)->get();
        return view('accueil')->with(['voitures'=>$voitures]);
    }
    // ===============================================================

    // ============= chaque voiture tout seule ========================
    public function showCar(Voiture $matricule){
        $client = session()->get('clientId');
        $ifreserved = $matricule->reservation->map(function($reservation){
            return [$reservation->voiture, $reservation];
        });
        // dd($ifreserved);
        return view('client.details')->with(['voiture'=>$matricule, 'client'=>$client, 'ifreserved'=>$ifreserved]);
    }
    // ==============================================================

    // ================== page d'ajoute voiture ======================
    public function create(){
        return view('admin.ajoutervoiture');
    }
    // ===============================================================

    // ================== Ajouter une Voiture =======================
    public function storeCar(Request $request){
        $validateData = $request->validate(
        [
            'matricule' => 'required|unique:voitures,matricule',
            'marque' => 'required|string',
            'modele' => 'required|string',
            'annee' => 'required|min:4|max:4',
            'capacite_habitacle' => 'required|integer',
            'carburation' => 'required|string',
            'transmission' => 'required|string',
            'prix' => 'required|integer',
            'compteur_km' => 'required|integer',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ], 
        [
            'matricule.required' => '*Le Matricule est obligatoire.',
            'matricule.unique' => '*Le Matricule doit être unique.',
            'marque.required' => '*La Marque est obligatoire.',
            'modele.required' => '*Le Modèle est obligatoire.',
            'annee.required' => '*Année de fabrication est obligatoire.',
            'annee.min' => '*Année doit etre contient 4 nombre min.',
            'annee.max' => '*Année est faux.',
            'capacite_habitacle.required' => '*Capacité est obligatoire.',
            'capacite_habitacle.max' => '*Capacité doit etre nombre .',
            'carburation.required' => '*Carburation est obligatoire.',
            'transmission.required' => '*Transmission est obligatoire.',
            'prix.required' => '*Prix est obligatoire.',
            'prix.integer' => '*Prix doit être un nombre.',
            'compteur_km.required' => '*Compteur est obligatoire.',
            'compteur_km.integer' => '*Compteur doit être un nombre.',
            'image.required' => '*Image est obligatoire.',
            'image.mimes' => '*Le fichier doit être une image.',
        ]);


        if($validateData){
        $voiture = new Voiture();
        $voiture->matricule = $validateData['matricule'];
        $voiture->marque = $validateData['marque'];
        $voiture->modele = $validateData['modele'];
        $voiture->annee = $validateData['annee'];
        $voiture->capacite_habitacle = $validateData['capacite_habitacle'];
        $voiture->carburation = $validateData['carburation'];
        $voiture->transmission = $validateData['transmission'];
        $voiture->prix= $validateData['prix'];
        $voiture->compteur_km= $validateData['compteur_km'];

        // =================== sauvgarde d'une photo ================
        // Récupérer l'extension ======
        $extension_image = $validateData['image']->getClientOriginalExtension();
        // ====== Donner un nom pour l'image ======
        $nom_image = $validateData['marque'].'_'.$validateData['modele'].'_'.$validateData['annee'].'.'.$extension_image;
        // ====== Donner le chemin pour le stockage ======
        $chemin = 'images/voitures';
        // ====== Copier l'image vers le lien ======
        $validateData['image']->move($chemin, $nom_image);
        // ====== Stocker le nom donnee vers la base données ======
        $voiture->image = $nom_image;
        // ==========================================================

        $voiture->save();
        return redirect('/accueiladmin');
    }else{
        return redirect()->back()->withErrors($validateData)->withInput();
    }}
    // ============================================================

    // ==================== Page modification d'une voiture =========================
    public function editCar($matricule){
        $voiture = Voiture::find($matricule);
        return view('admin.modifiervoiture')->with('voiture', $voiture);
    }
    // ===============================================================

    // =============== Modifier voiture =========================
    public function updateCar(Request $request, $matricule){
        $validateData = $request->validate(
        [
            // 'matricule' => 'required|unique:voitures,matricule',
            'marque' => 'required|string',
            'modele' => 'required|string',
            'annee' => 'required|min:4|max:4',
            'capacite_habitacle' => 'required|integer',
            'carburation' => 'required|string',
            'transmission' => 'required|string',
            'prix' => 'required|integer',
            'compteur_km' => 'required|integer',
            // 'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ], 
        [
            // 'matricule.required' => '*Le Matricule est obligatoire.',
            // 'matricule.unique' => '*Le Matricule doit être unique.',
            'marque.required' => '*La Marque est obligatoire.',
            'modele.required' => '*Le Modèle est obligatoire.',
            'annee.required' => '*Année de fabrication est obligatoire.',
            'annee.min' => '*Année doit etre contient 4 nombre min.',
            'annee.max' => '*Année est faux.',
            'capacite_habitacle.required' => '*Capacité est obligatoire.',
            'capacite_habitacle.max' => '*Capacité doit etre nombre .',
            'carburation.required' => '*Carburation est obligatoire.',
            'transmission.required' => '*Transmission est obligatoire.',
            'prix.required' => '*Prix est obligatoire.',
            'prix.integer' => '*Prix doit être un nombre.',
            'compteur_km.required' => '*Compteur est obligatoire.',
            'compteur_km.integer' => '*Compteur doit être un nombre.',
            // 'image.required' => '*Image est obligatoire.',
            // 'image.mimes' => '*Le fichier doit être une image.',
        ]);


        if($validateData){
        $voiture = Voiture::find($matricule);
        // $voiture->matricule = $validateData['matricule'];
        $voiture->marque = $validateData['marque'];
        $voiture->modele = $validateData['modele'];
        $voiture->annee = $validateData['annee'];
        $voiture->capacite_habitacle = $validateData['capacite_habitacle'];
        $voiture->carburation = $validateData['carburation'];
        $voiture->transmission = $validateData['transmission'];
        $voiture->prix= $validateData['prix'];
        $voiture->compteur_km= $validateData['compteur_km'];

        // =================== sauvgarde d'une photo ================
        // Récupérer l'extension ======
        // $extension_image = $validateData['image']->getClientOriginalExtension();
        // ====== Donner un nom pour l'image ======
        // $nom_image = $validateData['marque'].'_'.$validateData['modele'].'_'.$validateData['annee'].'.'.$extension_image;
        // ====== Donner le chemin pour le stockage ======
        // $chemin = 'images/voitures';
        // ====== Copier l'image vers le lien ======
        // $validateData['image']->move($chemin, $nom_image);
        // ====== Stocker le nom donnee vers la base données ======
        // $voiture->image = $nom_image;
        // ==========================================================

        $voiture->save();
        return redirect('/accueiladmin');
    }else{
        return redirect()->back()->withErrors($validateData)->withInput();
    }}
    // =========================================================

    // ============================ Filtrer les voitures ============================
    public function filterCar(Request $request){
        $marque = $request->input('marque');
        $prix = $request->input('prix');
        $carburation = $request->input('carburation');

        if($marque){
            $voitures = Voiture::all()->where('marque', '=', $marque);
                if($prix){
                    $voitures = Voiture::all()->where('marque', '=', $marque)->where('prix', '<=', $prix);
                    if($carburation){
                        $voitures = Voiture::all()->where('marque', '=', $marque)->where('prix', '<=', $prix)->where('carburation', '=', $carburation);}
                }
                if($carburation){
                    $voitures = Voiture::all()->where('marque', '=', $marque)->where('carburation', '=', $carburation);
                    if($prix){
                        $voitures = Voiture::all()->where('marque', '=', $marque)->where('prix', '<=', $prix)->where('carburation', '=', $carburation);}
            }
        }
        elseif($prix){
            $voitures = Voiture::all()->where('prix', '<=', $prix);
                if($marque){
                    $voitures = Voiture::all()->where('prix', '<=', $prix)->where('marque', '=', $marque);
                    if($carburation){
                        $voitures = Voiture::all()->where('prix', '<=', $prix)->where('marque', '=', $marque)->where('carburation', '=', $carburation);}
                }
                if($carburation){
                    $voitures = Voiture::all()->where('prix', '<=', $prix)->where('carburation', '=', $carburation);
                    if($marque){
                        $voitures = Voiture::all()->where('prix', '<=', $prix)->where('marque', '<=', $marque)->where('carburation', '=', $carburation);}
            }
        }
        elseif($carburation){
            $voitures = Voiture::all()->where('carburation', '=', $carburation);
                if($marque){
                    $voitures = Voiture::all()->where('carburation', '=', $carburation)->where('marque', '=', $marque);
                    if($prix){
                        $voitures = Voiture::all()->where('prix', '<=', $prix)->where('marque', '=', $marque)->where('carburation', '=', $carburation);}
                }
                if($prix){
                    $voitures = Voiture::all()->where('prix', '<=', $prix)->where('carburation', '=', $carburation);
                    if($marque){
                        $voitures = Voiture::all()->where('prix', '<=', $prix)->where('marque', '<=', $marque)->where('carburation', '=', $carburation);}
            }
        }else{
            return redirect('/nosvoitures');
        }


        


        // dd($voitures);
        // $allVoitures = Voiture::all();
        return view('client.marques')->with(['voitures'=>$voitures]);
    }
    // ============================================================

    // ================= Supprimer une voiture ====================
    public function deleteCar(Voiture $matricule){
        // ***** il faut identifier le PK sur le model 
        // ********* tu peux supprimer juste avec le Model et le $matricule **********
        if($matricule->disponibilite != 1){
            session()->flash('erreursupprimer', 'Tu peux pas supprimer la '.$matricule->marque.' '.$matricule->modele.', elle est réservée!');
            return redirect('/accueiladmin');
        }else{
            File::delete(public_path('/images/voitures/'.$matricule->image));
            $matricule->delete();
            session()->flash('supprimervoiture', 'Tu as supprimé la '.$matricule->marque.' '.$matricule->modele.' avec succés');
            return redirect('/accueiladmin');
        }
    }
    // ==========================================================


    // ================ api =====================
    // public function getCars(){
    //     $cars = Voiture::all();
    //     return response()->json($cars);
    // }

    // public function getCar($marque){
    //     $car = Voiture::all()->where('marque', $marque);
    //     return response()->json($car);
    // }
    // ===================================
}