<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Chapitre;

use Auth;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function mesSeances()
    {
        $teacher=Auth::user()->teacher;
        $mesclasses=Course::where('teacher_id',$teacher->id)->get();
        //  dd($mesclasses);
         $meschapitres=collect();
        $i=0;
        foreach ($mesclasses as $key => $classe) {
            $chapitresbyclasses[$classe->classe->slug]=$classe->chapitres;
            $meschapitres=$meschapitres->merge($classe->chapitres);
        }
        
        //  dd($meschapitres);
        
        $courses=Course::where('teacher_id',$teacher->id)->get();
        
      
        
       
        return view('Teacher.seances.index',compact('courses','meschapitres','chapitresbyclasses'));
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
        'titre'       => 'required',
        'description'       => 'nullable',
        'url'       => 'required',
        'course_id'       => 'required',
        'chapitre_id'       => 'required',
        
    );
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect()->route('teacher.messeances')
        ->with('Error','Vérifiez vos champs.');
    } else {
        // store
        $seance = new Seance;
        $seance->titre = $request-> titre;
        $seance->description      =  $request-> description;
        $seance->url      =  $request-> url;
        $seance->course_id      =  $request-> course_id;
        $seance->chapitre_id      =  $request-> chapitre_id;
        $seance->save();

        // redirect
        return redirect()->route('teacher.messeances')
        ->with('success','Nouvelle séance crée avec succés.');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Seance $seance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $seance = Seance::find($id); 
        return response()->json([
                       'success' => true,
                        'data' => $seance 
                          ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seance $seance)
    {
       
        $rules = array(
            'titre'       => 'required',
            'description'       => 'required',
            'url'       => 'required',
            'course_id'       => 'required',
            'chapitre_id'       => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                 'data' => $request 
                   ]);
            
        } else {
            
            // update
            // $seance = Seance::find($id);
            $seance->titre = $request-> titre;
            $seance->description      =  $request-> description;
            $seance->url      =  $request-> url;
            $seance->course_id      =  $request-> course_id;
            $seance->chapitre_id      =  $request-> chapitre_id;
            $seance->save();
    
            // redirect
            // return redirect()->route('matieres.index')
            // ->with('success','Matière modifiée avec succés.');

            return response()->json(['success' => true, 
            'data'=>$seance   
                   ]); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seance $seance)
    {
        $seance->delete();
    
        return redirect()->route('teacher.messeances')
                        ->with('Delete','Séance supprimée avec succés');
    }
}
