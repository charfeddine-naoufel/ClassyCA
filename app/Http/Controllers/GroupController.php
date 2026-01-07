<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
                
        $groups = Group::all();
        // dd($groups);
        return view('Admin.Classe.index',compact('groups'));
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
        'nomg'       => 'required|unique:groups',
        'classe_id'      => 'required'
       
    );
    $eleves=$request->eleves;
    
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect()->route('classes.index')
        ->with('Error','Vérifiez vos champs. Nom de groupe existe déjà!!! ');
    } else {
        // store
        $group = new Group;
        $group->nomg = $request-> nomg;
        $group->classe_id      =  $request-> classe_id;
        
        $group->save();
        $group = Group::latest()->first();

            if (!empty($eleves) && is_array($eleves)) {
                foreach ($eleves as $item) {
                    $eleve = Student::find($item);
                    
                    if ($eleve) {
                        $eleve->group_id = $group->id;
                        $eleve->save();
                    }
                }
            } else {
                return redirect()->route('classes.index')
                ->with('error', 'Veuillez sélectionner au moins un élève.');
            }

        // redirect
        return redirect()->route('classes.index')
        ->with('success','Nouveau group crée avec succés.');
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
        $group = Group::find($id); 
        $group['slug']=$group->classe->slug;
        // $eleves=Student::select('id','nom_fr','prenom_fr')->where('group_id',$id)->get();
        // $group['eleves']=$eleves;    
        
                return response()->json([
                               'success' => true,
                                'data' => $group 
                                  ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        
               $rules = array(
                'nomg'       => 'required',
                'classe_id'      => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->route('classes.index')
                ->with('Error','Vérifiez vos champs.');
            } else {
                // update
                $group = Group::find($id);
                $group->nomg = $request-> nomg;
                $group->classe_id      =  $request-> classe_id;
                $group->save();
        
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
        $group=Group::find($id);
        $group->delete();
    
        return redirect()->route('groups.index')
                        ->with('success','Classe supprimée avec succés');
    }
}
