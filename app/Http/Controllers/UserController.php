<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{


    public function returnviewinscription()
    {


        return view('Inscription');
    }

    public function inscription(Request $request)
    {
        $request->validate([
            'name' => 'required| min:1 |max:100| string ',
            'email' => 'required |string|unique:users|max:100|min:1',
            'password' => 'required|string|confirmed|min:8|max:100',
        ]);

        $newsletter = $request->has('newsletter') ? 1 : 0;
        $name = strtolower($request->input('name'));
        $email = strtolower($request->input('email'));
        $code = random_int(100, 999);

        $user = new User([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($request->input('password')),
            'Newsletter' => $newsletter,
            'code' => $code
        ]);

        $user->save();

        Mail::to($user->email)->send(new ConfirmationMail($user, $code));

        return redirect()->route('Connexion')->with('success', 'Compte créé avec succes !.');
    }

    public function returnviewconnexion()
    {

        return view('Connexion');
    }

    public function connexion(Request $request)
    {
        if (Auth::attempt(['email' => strtolower($request->input('email')), 'password' => $request->input('password')])) {
            return redirect()->route('Landing');
        }
        return back()->withErrors(['identifiant' => 'Identifiant ou mot de passe incorrect.']);
    }

    public function deconnexion()
    {
        Auth::logout();
        return redirect()->route('Home');
    }
}
