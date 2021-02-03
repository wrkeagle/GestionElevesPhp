<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eleve;
use App\Promo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
class EleveController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get("search");
        if($search){
            $eleve = Eleve::where('nom', 'like', '%'.$search.'%')->orWhere('prenom', 'like', '%' . $search . '%')->orWhere('email', 'like', '%' . $search . '%')->get();
        }else{
            $eleve = Eleve::all();
        }
        return view("eleves.index", ["eleves" => $eleve, "search" => $search]);
    }


    public function create(Request $request)
    {
        $promo_id = $request->input("promo");

        return view("eleves.create", ["promo" => Promo::find($promo_id)]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'promo_id',
        ]);

        Eleve::create($request->all());

        return redirect()->route('eleves.index')
            ->with('success','Eleve créé avec succès.');
    }


    public function show(Eleve $eleve)
    {
        return view('eleves.show')->with('eleves', $eleve);
    }


    public function edit(Eleve $eleve)
    {
        return view('eleves.edit')->with([
            'eleves' => $eleve
        ]);
    }


    public function update(Request $request, Eleve $eleve)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
        ]);
        $eleve = Eleve::find($eleve->id);
        $eleve->nom = $request->get('nom');
        $eleve->prenom = $request->get('prenom');
        $eleve->email = $request->get('email');

        $eleve->save();
        return redirect()->route("eleves.index");
    }


    public function destroy(Eleve $eleve)
    {
        $eleve->delete();

        return redirect()->route('eleves.index')
            ->with('success','Elève supprimé.');
    }
}
