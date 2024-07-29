<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Matiere;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ChapitreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $chapitresByClasses=Chapitre::where('teacher_id',Auth::user()->teacher->id)->groupBy('classe_id');  
        // dd($chapitres)   ;  
        $chapitres=Chapitre::all(); 
        $courses=Course::where('teacher_id',Auth::user()->teacher->id)->get();
        // dd($courses);
        $chapitresByClasses=[];
       foreach ($courses as $course) {
        $chapitresByClasses[$course->classe->slug]=Chapitre::where('course_id',$course->id)->get();
        // $chapitresByClasses[$course->classe_id]->push($course->classe->slug);
        } 
        //    dd($chapitresByClasses);
        return view('Teacher.Chapitre.index',compact('chapitres','courses','chapitresByClasses'));
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
        'trimestre'       => 'required',
        'course_id'       => 'required',
        
    );
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect()->route('chapitres.index')
        ->with('Error','Vérifiez vos champs.');
    } else {
        // store
        $chapitre = new Chapitre;
        $chapitre->titre = $request-> titre;
        $chapitre->description      =  $request-> description;
        $chapitre->trimestre      =  $request-> trimestre;
        $chapitre->course_id      =  $request-> course_id;
        $chapitre->save();

        // redirect
        return redirect()->route('chapitres.index')
        ->with('success','Nouveau chapitre crée avec succés.');
    }

        
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
    public function edit($id)
    { 
        $course = Course::find($id); 
                return response()->json([
                               'success' => true,
                                'data' => $course 
                                  ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        
               $rules = array(
                'classe_id'       => 'required',
                'teacher_id'       => 'required',
                'matiere_id'       => 'required'
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->route('courses.index')
                ->with('Error','Vérifiez vos champs.');
            } else {
                // update
                $course = Course::find($id);
                $course->classe_id = $request-> classe_id;
                $course->teacher_id = $request-> teacher_id;
                $course->matiere_id = $request-> matiere_id;
                $course->save();
        
                // redirect
                // return redirect()->route('matieres.index')
                // ->with('success','Matière modifiée avec succés.');

                return response()->json(['success' => true,    
                       ]); 
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
    
        return redirect()->route('courses.index')
                        ->with('success','Cours supprimé avec succés');
    }
}
