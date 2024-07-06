<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voiture;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // ======= page connexion admin ===========
    public function index()
    {
        return view('admin.connexionadmin');
    }
    // ========================================

    // =============== login admin ===========================
    public function loginAdmin(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Le email est obligatoire',
            'password.required' => 'Le mot de passe est obligatoire',
        ]);

        $admin = User::where('email', $validateData['email'])
                    ->where('password', $validateData['password'])
                    ->first();

        if ($admin) {
            $request->session()->put('adminId', $admin->id);

            return redirect('/accueiladmin');
        } else {
            session()->flash('failed', "Vous n'avez pas l'accès!");

            return redirect()->back()->withInput(['email', 'password']);
        }
    }
    // ====================================================================

    // ================= log Out ============================
    public function logoutAdmin()
    {
        if (session()->has('adminId')) {
            session()->pull('adminId');

            return redirect('/connexionadmin');
        }
    }
    // ===================================================

    // ================== page profile ======================
    public function profile(Request $request)
    {
        $data = [];
        $data = User::find(session()->get('adminId'));
        $voitures = Voiture::all();

        return view('admin.accueiladmin')->with(['data' => $data, 'voitures' => $voitures]);
    }
    // ============================================================
}
