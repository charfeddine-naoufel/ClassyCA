<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Classe;
use App\Models\Matiere;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        
        $courses = Course::all();
        $classes=Classe::all();
        $matieres=Matiere::all();
        $groups=Group::all();
        // dd($groups);
        return view('Teacher.courses.index',compact('courses','classes','matieres','groups'));
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
        'classe_id'       => 'required',
        'teacher_id'       => 'required',
        'group_id'       => 'required',
        'matiere_id'       => 'required'
        
    );
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect()->route('teacher.mescours')
        ->with('Error','Vérifiez vos champs.');
    } else {
        // store
        $course = new Course;
        $course->classe_id = $request-> classe_id;
        $course->teacher_id      =  $request-> teacher_id;
        $course->group_id      =  $request-> group_id;
        $course->matiere_id      =  $request-> matiere_id;
        $course->save();

        // redirect
        return redirect()->route('teacher.mescours')
        ->with('success','Nouveau cours crée avec succés.');
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
                'group_id'       => 'required',
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
                $course->group_id = $request-> group_id;
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
