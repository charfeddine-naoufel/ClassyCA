<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Matiere.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('matieres.index')
                        ->with('success','Nouvelle matière crée avec succés.');
        dd($request);
        $matiere=$request->validate([
            'nom-matiere'=>'required',
            'label-matiere'=>'required'
        ]);
        Matiere::create($request->all());
     
        return redirect()->route('matieres.index')
                        ->with('success','Nouvelle matière crée avec succés.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Matiere $matiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matiere $matiere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matiere $matiere)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matiere $matiere)
    {
        //
    }
}
