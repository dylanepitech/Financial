<?php

namespace App\Http\Controllers;

use App\Models\depense;
use App\Models\entrer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class LandingController extends Controller
{
    private $user;

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

        $options = [
            'Salaire',
            'Autre',
            'Voiture',
            'Moto',
            'Maison',
            'Animaux',
            'Enfants',
            'Telephone',
            'Autre',
            'Eau',
            'Gaz',
            'Electriciter',
            'Sport',
            'Internet',
            'Loyer',
            'Credit',
            'Apple',
            'Android',
            'Course',
            'Ammeublement',
        ];

        $user_id = $user->id;

        $facture_name = DB::table('depenses')
            ->where('user_id', $user_id)
            ->pluck('facture_name');

        $facture_tarif = DB::table('depenses')
            ->where('user_id', $user_id)
            ->pluck('facture_tarif');

        $entrer_name = DB::table('entrers')
            ->where('user_id', $user_id)
            ->pluck('entrer_name');

        $entrer_tarif = DB::table('entrers')
            ->where('user_id', $user_id)
            ->pluck('entrer_tarif');

        $ligne_depense = depense::where('user_id', $user_id)->orderBy('facture_date', 'desc')->simplePaginate(10);
        $ligne_entrer = entrer::where('user_id', $user_id)->orderBy('facture_date', 'desc')->simplePaginate(10);

        $total_depenses = $ligne_depense->sum('facture_tarif');
        $total_entrer = $ligne_entrer->sum('entrer_tarif');

        $balance = $total_entrer - $total_depenses;

        return view('Landing', ['options' => $options, 'facture_name' => $facture_name, 'facture_tarif' => $facture_tarif, 'entrer_name' => $entrer_name, 'entrer_tarif' => $entrer_tarif, 'ligne_entrer' => $ligne_entrer, 'ligne_depense' => $ligne_depense, 'balance' => $balance], compact('user'));
    }
    public function code_validated(Request $request)
    {
        $user = $this->user;

        $code = $request->input('code');

        $codeuser = $user->code;

        if ($code == $codeuser) {

            $user->code_verified = 1;

            $user->save();

            return back();
        } else {
            return back()->with('error', 'Code de validation invalide');
        }
    }


    public function formulaire(Request $request)
    {
        $user = $this->user;

        if ($request->has('entrer_name')) {

            $request->validate([
                'entrer_name' => 'required',
                'entrer_tarif' => 'required',
                'entrer_date' => 'required'
            ]);


            $date_reverse = Carbon::parse($request->input('enter_date'))->format('d-m-Y');

            $entrer = new entrer([
                'entrer_name' => $request->input('entrer_name'),
                'entrer_tarif' => $request->input('entrer_tarif'),
                'entrer_date' => $date_reverse,
                'user_id' => $user->id,
            ]);

            $entrer->save();

            return redirect()->route('Landing')->with('success', 'Entrer ajouter');
        } elseif ($request->has('facture_name')) {


            $request->validate([
                'facture_name' => 'required',
                'facture_tarif' => 'required',
                'facture_date' => 'required'
            ]);


            $date_reverse = Carbon::parse($request->input('facture_date'))->format('d-m-Y');

            $entrer = new depense([
                'facture_name' => $request->input('facture_name'),
                'facture_tarif' => $request->input('facture_tarif'),
                'facture_date' => $date_reverse,
                'user_id' => $user->id,
            ]);

            $entrer->save();

            return redirect()->route('Landing')->with('success', 'Dépense ajouter');
        }
    }

    public function suppression($id)
    {
        DB::table('entrers')
            ->where('id', $id)
            ->delete();

        return redirect()->back();
    }
    public function suppression2($id)
    {
        DB::table('depenses')
            ->where('id', $id)
            ->delete();

        return redirect()->back();
    }
}
