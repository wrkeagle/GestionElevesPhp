<?php

namespace App\Http\Controllers;

use App\Promo;
use Illuminate\Http\Request;
use App\Module;
class ModuleController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get("search");
        if($search){
            $module = Module::where('nom', 'like', '%'.$search.'%')->get();
        }else{
            $module = Module::all();
        }
        return view("modules.index", ["actual_promo" => $request->get("promo"),"modules" => $module, "search" => $search]);
    }


    public function create(Request $request)
    {
        return view('modules.create', ["promos" => Promo::all(), "actual_promo" => $request->input("promo_id")]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
        ]);
        $module = new Module([
            'nom' => $request->get('nom'),
            'description' => $request->get('description'),
        ]);
        $module->save();

        $module->promos()->attach($request->input("promos"));
        return redirect()->route("modules.index", ["promo" => $request->get("promo_id")]);

    }


    public function show(Module $module)
    {
        return view("modules.show", ["modules" => $module]);

    }


    public function edit(Module $module)
    {
        return view("modules.edit", ["promos" => Promo::all(), "promo_edit" => $module]);
    }


    public function update(Request $request, Module $module)
    {

        $request->validate([
            'nom' => 'required|alpha',
            'description'=> 'required',
        ]);

        $module->nom = $request->get('nom');
        $module->description = $request->get('description');

        $module->promos()->detach();
        $module->promos()->attach($request->input("promos"));
        $module->save();
        return redirect()->route("modules.index");
    }


    public function destroy(Module $module)
    {
        $module->delete();

        return redirect()->route('modules.index')
            ->with('success','Supprimé.');
    }
}
