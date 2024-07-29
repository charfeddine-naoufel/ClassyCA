<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Matiere;
use App\Models\Group;
use App\Models\Classe;
use App\Models\User;
use Auth;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $enseignants=Teacher::all(); 
      return view('Admin.Enseignant.index',compact('enseignants'));
    }
    public function mescours()
    {
       $courses=Course::where('teacher_id',Auth::user()->teacher->id)->get(); 
    //    dd($courses);
       $matieres=Matiere::all();
       $groups=Group::all();
       $classes=Classe::all();
      return view('Teacher.courses.index',compact('courses','matieres','groups','classes'));
    }
    public function mesgroups()
    {
       $courses=Course::where('teacher_id',Auth::user()->teacher->id)->get(); 
       $groups=[];
       foreach ($courses as $key => $course) {
           $groups[$course->group_id]=Group::where('id',$course->group_id)->get();
       }
    //  dd($groups);
       
      return view('Teacher.group.mesgroups',compact('groups'));
    }
    public function home()
    {
        $user = Auth::user();
      return view('Teacher.home',compact('user'));
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
            // dd($request);
    $rules = array(
        'nom_fr'       => 'required',
        'prenom_fr'      => 'required',
        'specialite'      => 'required',
        'tel'      => 'required|numeric',
        'email'      => 'required',
        'password'      => 'required',
        'status'      => 'required',
         'photo' => 'image|mimes:jpeg,png,jpg,gif,svg'

    );
   
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect()->route('enseignants.index')
        ->with('Error','Vérifiez vos champs.');
    } else {
        // store new user
       
       
        $user=new User;
        $user['name']=$request['nom_fr'];
        $user['email']=$request['email'];
        $user['password']=$request['password'];
        // $user['password_confirmation']=$request['password'];
        $user['role']='teacher';
        $user->save();
        $user=User::latest()->first();;
        // store new teacher
        $teacher = new Teacher;
        if ($request->hasFile('photo')) {
            // put image in the public storage
           $filePath = Storage::disk('public')->put('images/teachers/photo', request()->file('photo'));
           $teacher['photo'] = $filePath;
       }
        
       
        $teacher->nom_fr = $request-> nom_fr;
        $teacher->prenom_fr = $request-> prenom_fr;
        $teacher->nom_ar = $request-> nom_ar;
        $teacher->prenom_ar = $request-> prenom_ar;
        $teacher->specialite      =  $request-> specialite;
        $teacher->tel      =  $request-> tel;
        $teacher->tel2      =  $request-> tel2;
        $teacher->email      =  $request-> email;
        $teacher->adresse      =  $request-> adresse;
        $teacher->bio      =  $request-> bio;
        // $teacher->photo      =  $request-> photo;
        $teacher->password      =  $request-> password;
        $teacher->status      =  $request-> status;
        $teacher->user_id      =  $user-> id;
        
        $teacher->save();

        // redirect
        return redirect()->route('enseignants.index')
        ->with('success','Nouvelle teacher crée avec succés.');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $enseignant = Teacher::find($id); 
                return response()->json([
                               'success' => true,
                                'data' => $enseignant 
                                  ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'nom_fr'       => 'required',
            'prenom_fr'      => 'required',
            'specialite'      => 'required',
            'tel'      => 'required|numeric',
            'email'      => 'required',
            'password'      => 'required',
            'status'      => 'required',
             'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
             'user_id' =>'required'
    
        );
       
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                 'data' => $enseignant 
                   ]);
            
            // store new user
           
        } else {  
            $teacher=Teacher::find($id);
            $user=User::find($teacher->user_id);
            
            $user['name']=$request['nom_fr'];
            $user['email']=$request['email'];
            $user['password']=$request['password'];
            // $user['password_confirmation']=$request['password'];
            $user['role']='teacher';
            $user->save();
            $user=User::latest()->first();;
            // store new teacher
            
            if ($request->hasFile('photo')) {
                // put image in the public storage
               $filePath = Storage::disk('public')->put('images/teachers/photo', request()->file('photo'));
               $teacher['photo'] = $filePath;
           }
            
           
            $teacher->nom_fr = $request-> nom_fr;
            $teacher->prenom_fr = $request-> prenom_fr;
            $teacher->nom_ar = $request-> nom_ar;
            $teacher->prenom_ar = $request-> prenom_ar;
            $teacher->specialite      =  $request-> specialite;
            $teacher->tel      =  $request-> tel;
            $teacher->tel2      =  $request-> tel2;
            $teacher->email      =  $request-> email;
            $teacher->adresse      =  $request-> adresse;
            $teacher->bio      =  $request-> bio;
            // $teacher->photo      =  $request-> photo;
            $teacher->password      =  $request-> password;
            $teacher->status      =  $request-> status;
            $teacher->user_id      =  $user-> id;
            
            $teacher->save();
    
            // redirect
            return response()->json(['success' => true,    
                       ]); 
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher=Teacher::find($id);
        $user=Teacher::find($teacher->id);
        $teacher->delete();
        $user->delete();
    
        return redirect()->route('enseignants.index')
                        ->with('delete','Enseignant supprimé avec succés');
    }
}
