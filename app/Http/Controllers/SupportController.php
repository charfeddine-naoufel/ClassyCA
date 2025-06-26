<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class SupportController extends Controller
{
    
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supports = Support::all();
        $chapitres = Auth::user()->teacher->chapitres;

        // dd($supports);
        return view('Teacher.Documents.index',compact('supports','chapitres'));
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
        'nom'       => 'required',
        'type'      => 'required',
        'chemin'      => 'required',
        'chapitre_id'      => 'required'
    );
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect()->route('documents.index')
        ->with('Error','Vérifiez vos champs.');
    } else {
        // store
        $support = new Support;
        $support->chapitre_id = $request-> chapitre_id;
        $support->nom      =  $request-> nom;
        $support->type      =  $request-> type;
        $support->chemin      =  $request-> chemin;
        
        $support->save();

        // redirect
        return redirect()->route('documents.index')
        ->with('success','Nouveau support crée avec succés.');
    }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    { 
        $support = Support::find($id); 
                return response()->json([
                               'success' => true,
                                'data' => $support 
                                  ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        
               $rules = array(
                'chapitre_id'       => 'required',
                'nom'      => 'required',
                'type'      => 'required',
                'chemin'      => 'required'
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->route('documents.index')
                ->with('Error','Vérifiez vos champs.');
            } else {
                // update
             $support = Support::find($id);
                $support->chapitre_id = $request-> chapitre_id;
                $support->nom      =  $request-> nom;
                $support->type      =  $request-> type;
                $support->chemin      =  $request-> chemin;
                
                $support->save();
        
                // redirect
                // return redirect()->route('supports.index')
                // ->with('success','Matière modifiée avec succés.');

                return response()->json(['success' => true,    
                       ]); 
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $support = Support::find($id);
        $support->delete();
    
        return redirect()->route('documents.index')
                        ->with('success','Support supprimé avec succés');
    }
}
