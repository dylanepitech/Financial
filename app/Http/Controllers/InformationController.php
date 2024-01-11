<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }


    public function returnview()
    {
        $user = $this->user;
        return view('Information', (compact('user')));
    }

    public function modification(Request $request)
    {
        $request->validate([
            'email' => 'nullable|min:2|max:100|string',
            'name' => 'nullable|min:2|max:100|string',
            'password' => 'nullable|min:8|max:100|string|confirmed'
        ]);

        $user = $this->user;

        if ($request->filled('name')) {
            $user->name = $request->input('name');
        }

        if ($request->filled('email')) {
            $user->email = $request->input('email');
        }

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $newslettervalue = $request->has('newsletter') ? 1 : 0;

        $user->Newsletter = $newslettervalue;

        $user->save();

        return redirect()->route('Landing')->with('success', 'Vos informations on bien étais mises à jours.');
    }
}
