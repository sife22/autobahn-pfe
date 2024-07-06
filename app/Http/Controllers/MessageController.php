<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Client;
use App\Models\Message;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    //
    public function index(){
        return view('client.contacteznous');
    }

    public function sendMessage(Request $request){
        $data = $request->validate([
            'nom' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'message' => 'required',
        ],
    [
        'nom.required'=>'Le nom est obligatoire.',
        'email.required'=>'Le email est obligatoire.',
        'tel.required'=>'Le téléphone est obligatoire.',
        'message.required'=>'Le message est obligatoire.',
    ]);
        if($data){
            Mail::to("sifeddinehadi22@gmail.com")->send(new SendMail($data));
            session()->flash('success', 'Merci pour votre message!');
            return redirect()->back();
        }else{
            return redirect()->back()->withErrors($data)->withInput();
        };
    }

    // public function storeMessage(Request $request){
    //     $validateData = $request->validate([
    //         'nom' => 'required',
    //         'email' => 'required',
    //         'tel' => 'required',
    //         'message' => 'required',
    //     ],
    // [
    //     'nom.required'=>'Le nom est obligatoire.',
    //     'email.required'=>'Le email est obligatoire.',
    //     'tel.required'=>'Le téléphone est obligatoire.',
    //     'message.required'=>'Le message est obligatoire.',
    // ]);

    // // $clientId = session()->get('clientId');
    // // $client = Client::find($clientId);
    // // dd($client->email);

    //     if($validateData){
    //         $message = new Message();
    //         $message->nom = $validateData['nom'];
    //         $message->email = $validateData['email'];
    //         $message->tel = $validateData['tel'];
    //         $message->message = $validateData['message'];
    //         $message->save();
    //         session()->flash('success', 'Merci pour votre message!');
    //         return redirect()->back();
    //     }else{
    //         return redirect()->back()->withErrors($validateData)->withInput();
    //     }
    // }

    // ========== store message with api =============
    // public function storeWithApi(Request $request){
    //     $message = new Message();
    //     $message->nom = $request['nom'];
    //     $message->email = $request['email'];
    //     $message->tel = $request['tel'];
    //     $message->message = $request['message'];
    //     $message->save();
    //     return response()->json(['succes'=>'Votre message a été envoyer avec succes']);
    // }

    // ===============================================
}
