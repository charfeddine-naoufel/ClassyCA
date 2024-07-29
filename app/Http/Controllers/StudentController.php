<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
use App\Models\Course;
use App\Models\Chapitre;
use App\Models\User;
use Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $eleves=Student::all(); 
      return view('Admin.Eleve.index',compact('eleves'));
    }
     public function home()
    {
        $user = Auth::user();
      return view('Student.home',compact('user'));
    }
    public function calendrier()
    {
        
      return view('Student.calendrier');
    }
    public function mescours()
    {
        $student=Auth::user()->student;
        $courses=Course::where('group_id',$student->group_id)->get();
        // $mycourses=[];
        // foreach ($courses as $key => $course) {
        //     $mycourses[$course->matiere->nom_matiere]=Chapitre::where('course_id',$course->id)->get();
        // }
        
        // dd($mycourses);
        if ($student->status==1) {
            
            return view('Student.mescours',compact('courses'));
        }
        else {
            
            return view('Student.mescoursNotPaid');
        }
    }
    public function chapitrescours($id)
    {
        
        $student=Auth::user()->student;
        $course=Course::find($id);
        $chapitres=Chapitre::where('course_id',$id)->get();
        // dd($chapitres);
        
      return view('Student.chapitres',compact('chapitres','course'));
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
            //dd($request);
    $rules = array(
        'nom_fr'       => 'required',
        'prenom_fr'      => 'required',
        'tel'      => 'required|numeric',
        'email'      => 'required',
        'password'      => 'required',
        'ville'      => 'required',

    );
   
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect()->route('register')
        ->with('Error','Vérifiez vos champs.');
    } else {
        // store new user
       
       
        $user=new User;
        $user['name']=$request['nom_fr'].' '.$request['prenom_fr'];
        $user['email']=$request['email'];
        $user['password']=$request['password'];
        // $user['password_confirmation']=$request['password'];
        $user['role']='student';
        $user->save();
        $user=User::latest()->first();
        // store new teacher
        $eleve = new Student;
               
       
        $eleve->nom_fr = $request-> nom_fr;
        $eleve->prenom_fr = $request-> prenom_fr;
        $eleve->nom_ar = $request-> nom_ar;
        $eleve->prenom_ar = $request-> prenom_ar;
        $eleve->tel      =  $request-> tel;
        $eleve->ville      =  $request-> ville;
        $eleve->email      =  $request-> email;
        $eleve->classe_id      =  $request-> classe_id;
        $eleve->password      =  $request-> password;
        $eleve->user_id      =  $user-> id;
        
        $eleve->save();

        // redirect
        return redirect()->route('student-dash')
        ->with('success','Nouvel Elève crée avec succés.');
    }
    }
    public function updateGrEl($id)
    {
        $eleve=Student::find($id);
        $eleve['group_id']=Null;
        $eleve->save();
        return redirect()->back();
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
        $eleve = Student::find($id); 
                return response()->json([
                               'success' => true,
                                'data' => $eleve 
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
                 'data' => $eleve 
                   ]);
            
            // store new user
           
        } else {  
            $eleve=Student::find($id);
            $user=User::find($eleve->user_id);
            
            $user['name']=$request['nom_fr'];
            $user['email']=$request['email'];
            $user['password']=$request['password'];
            // $user['password_confirmation']=$request['password'];
            $user['role']='student';
            $user->save();
            $user=User::latest()->first();;
            // store new student
            
           
            
           
            $eleve->nom_fr = $request-> nom_fr;
            $eleve->prenom_fr = $request-> prenom_fr;
            $eleve->nom_ar = $request-> nom_ar;
            $eleve->prenom_ar = $request-> prenom_ar;
            $eleve->specialite      =  $request-> specialite;
            $eleve->tel      =  $request-> tel;
            $eleve->tel2      =  $request-> tel2;
            $eleve->email      =  $request-> email;
            $eleve->adresse      =  $request-> adresse;
            $eleve->bio      =  $request-> bio;
            // $eleve->photo      =  $request-> photo;
            $eleve->password      =  $request-> password;
            $eleve->status      =  $request-> status;
            $eleve->user_id      =  $user-> id;
            
            $eleve->save();
    
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
        $eleve=Student::find($id);
        $user=User::find($eleve->user_id);
        $eleve->delete();
        $user->delete();
    
        return redirect()->route('eleves.index')
                        ->with('delete','Eleve supprimée avec succés');
    }
}
