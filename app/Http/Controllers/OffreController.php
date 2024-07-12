<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $offres=Offre::all();
        return view('Admin.Offre.index',compact('offres'));
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
        //    dd($request);
    $rules = array(
        'nom_off'       => 'required',
        'descr_off'      => 'required',
        'date_deb'       => 'required|date',
        'date_fin'      => 'required|date',
    );
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect()->route('offres.index')
        ->with('Error','Vérifiez vos champs.');
    } else {
        // store
        $offre = new Offre;
        $offre->nom_off = $request-> nom_off;
        $offre->descr_off=  $request-> descr_off;
        $offre->date_deb=  $request-> date_deb;
        $offre->date_fin=  $request-> date_fin;

        $offre->save();

        // redirect
        return redirect()->route('offres.index')
        ->with('success','Nouvelle Offre crée avec succés.');
    }

    }

    /**
     * Display the specified resource.
     */
    public function show(Offre $offre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $offre = Offre::find($id); 
        return response()->json([
                       'success' => true,
                        'data' => $offre 
                          ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offre $offre)
    {
           //    dd($request);
    $rules = array(
        'nom_off'       => 'required',
        'descr_off'      => 'required',
        'date_deb'       => 'required|date',
        'date_fin'      => 'required|date',
    );
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect()->route('offres.index')
        ->with('Error','Vérifiez vos champs.');
    } else {
        // store
        // $offre=Offre::find($id)->first();
        $offre->nom_off = $request-> nom_off;
        $offre->descr_off=  $request-> descr_off;
        $offre->date_deb=  $request-> date_deb;
        $offre->date_fin=  $request-> date_fin;

        $offre->save();

        // redirect
        return response()->json(['success' => true,    
                       ]); 
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offre $offre)
    {
        $offre->delete();
    
        return redirect()->route('offres.index')
                        ->with('success','Offre supprimée avec succés');
    }
}
