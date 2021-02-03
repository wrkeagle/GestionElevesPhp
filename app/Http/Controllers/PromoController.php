<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promo;

class PromoController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get("search");
        if($search){
            $promo= Promo::where('nom', 'like', '%'.$search.'%')->get();
        }else{
            $promo = Promo::all();
        }
        return view("promos.index", ["promos" => $promo, "search" => $search]);
    }

    public function create()
    {
        return view('promos.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'specialite' => 'required'
        ]);

        Promo::create($request->all());

        return redirect()->route('promos.index')
            ->with('success','Promo created successfully.');
    }

    public function show(Promo $promo)
    {
        return view("promos.show", ["promos" => $promo]);
    }

    public function edit(Promo $promo)
    {
        return view('promos.edit')->with([
            'promos' => $promo
        ]);
    }

    public function update(Request $request, Promo $promo)
    {
        $request->validate([
            'nom' => 'required',
            'specialite' => 'required'
        ]);

        $promo = Promo::find($promo->id);
        $promo->nom = $request->get('nom');
        $promo->specialite = $request->get('specialite');

        $promo->save();
        return redirect()->route("promotions.index");
    }
    public function storeModules(Request $request) {
        $promo = Promo::find($request->input("promotion_id"));
        $promo->modules()->detach();
        $promo->modules()->attach($request->input("modules"));

        return redirect()->route("modules.index", ["promo" => $promo->id]);
    }

    public function destroy(Promo $promo)
    {
        $promo->delete();

        return redirect()->route('promos.index')
            ->with('success','Promo deleted successfully');
    }
}
