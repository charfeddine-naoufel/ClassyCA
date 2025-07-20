<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Student;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClasseController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groupes = Student::select('group_id')->distinct()->whereNotNull('group_id') ->get();
        $elevesNiveaux = [];

    foreach ($groupes as $groupe) {
    $classeRef = Student::where('group_id', $groupe->group_id)
        ->with('classe')
        ->first()
        ->classe;

    if (!$classeRef) {
        continue; 
    }

    $niveau = $classeRef->niveau;
    $section = $classeRef->section;
    $eleves = Student::whereHas('classe', function ($query) use ($niveau, $section) {
        $query->where('niveau', $niveau)
              ->where('section', $section);
    })->with('classe')->get();

    $elevesNiveaux[$groupe->group_id] = $eleves;
    }
    // dd($elevesNiveaux);


        $eleves=Student::where('group_id',Null)->get(); 
        $groups=Group::all();
        $classes = Classe::all();
        // dd($classes);
        return view('Admin.Classe.index',compact('classes','eleves','groups','elevesNiveaux'));
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
        'niveau'       => 'required',
        'section'      => 'required',
        'slug'      => 'required'
    );
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect()->route('classes.index')
        ->with('Error','Vérifiez vos champs.');
    } else {
        // store
        $classe = new Classe;
        $classe->niveau = $request-> niveau;
        $classe->section      =  $request-> section;
        $classe->slug      =  $request-> slug;
        $classe->save();

        // redirect
        return redirect()->route('classes.index')
        ->with('success','Nouvelle classe crée avec succés.');
    }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    { 
        $classe = Classe::find($id); 
                return response()->json([
                               'success' => true,
                                'data' => $classe 
                                  ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        
               $rules = array(
                'niveau'       => 'required',
                'section'      => 'required',
                'slug'      => 'required'
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->route('classes.index')
                ->with('Error','Vérifiez vos champs.');
            } else {
                // update
                $classe = Classe::find($id);
                $classe->niveau = $request-> niveau;
                $classe->section      =  $request-> section;
                $classe->slug      =  $request-> slug;
                $classe->save();
        
                // redirect
                // return redirect()->route('classes.index')
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
        $classe=Classe::find($id);
        $classe->delete();
    
        return redirect()->route('classes.index')
                        ->with('success','Classe supprimée avec succés');
    }
}
