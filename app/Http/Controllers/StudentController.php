<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\Group;
use App\Models\Classe;
use App\Models\Course;
use App\Models\Chapitre;
use App\Models\Live;
use App\Models\User;
use Auth;
use Jubaer\Zoom\Facades\Zoom;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $eleves=Student::all(); 
       $groups = Group::all();
       $classes = Classe::all();

      return view('Admin.Eleve.index',compact('eleves','groups','classes'));
    }
     public function home()
    {
        $user = Auth::user();
      return view('Student.home',compact('user'));
    }

    public function updateGroup(Request $request, $id)
{
    $student = Student::findOrFail($id);
    
    // $student->group_id = $request->input('group_id');
     $student->group_id = $request->group_id;
    $student->save();
    return redirect()->route('classes.index')
                ->with('Success','Affectation du groupe avec success');
    // return response()->json(['success' => true]);
}
    public function calendrier()
    { 
        $student=Auth::user()->student;
        $meetings = Live::where('start_time','>=',now())->where('group_id',$student->group_id)->get();
        // dd($meetings->first()->course->groupe);
        $events = [];
        
        foreach ($meetings as $meeting) {
            $title=$meeting->course->matiere->label_matiere.' : '.$meeting['topic'];
            $title = nl2br($title);
            $color='';
            if ($meeting->course->matiere->label_matiere=='Eco')
            $color='#4caf50';
            elseif ($meeting->course->matiere->label_matiere=='Gest') {
                $color='#d22346';
            }
            elseif ($meeting->course->matiere->label_matiere=='Info') {
                $color='#ffc107';
            }
            // dd($title);
            $url='#';
            $student=Auth::user()->student;
            if ($student->status==1) {
                $url=$meeting['join_url'];
            }
            $events[]=[
                'title' => $title,
                'start' => $meeting['start_time'], // Assurez-vous que vos noms de colonnes correspondent à votre base de données
                'end' => $meeting['start_time'],
                'color' => $color,
                'url' => $url,
                // Ajoutez d'autres champs d'événement si nécessaire
            ];
          
        }
        
    //    dd($events);
      return view('Student.calendrier',compact('events'));
    }
    public function calendarlives()
    {
        
        $meetings = Zoom::getUpcomingMeeting();
        
        $events = [];
        foreach ($meetings['data']['meetings']as $meeting) {
            $events[]= [
                'title' => $meeting['topic'],
                'start' => $meeting['start_time'], // Assurez-vous que vos noms de colonnes correspondent à votre base de données
                'end' => $meeting['start_time'],
                
                'url' => $meeting->join_url,
                // Ajoutez d'autres champs d'événement si nécessaire
            ];
        }

        return response()->json(['events'=>$events]);

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
        // Définir les règles de validation
        $rules = [
            'nom_fr' => 'required|string|max:255',
            'prenom_fr' => 'required|string|max:255',
            'nom_ar' => 'nullable|string|max:255',
            'prenom_ar' => 'nullable|string|max:255',
            'tel' => 'required|numeric|digits_between:8,15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed', // Nécessite password_confirmation
            'ville' => 'required|string|max:255',
            'classe_id' => 'nullable|exists:classes,id',
        ];

        // Messages personnalisés en français
        $messages = [
            'nom_fr.required' => 'Le nom en français est obligatoire.',
            'prenom_fr.required' => 'Le prénom en français est obligatoire.',
            'tel.required' => 'Le numéro de téléphone est obligatoire.',
            'tel.numeric' => 'Le numéro de téléphone doit contenir uniquement des chiffres.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'ville.required' => 'La ville est obligatoire.',
        ];

        // Effectuer la validation
        $validator = Validator::make($request->all(), $rules, $messages);

        // Si la validation échoue, rediriger avec les erreurs
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // ← IMPORTANT : Envoyer les erreurs à la vue
                ->withInput();            // ← Conserver les valeurs saisies
        }

        try {
            // Créer l'utilisateur
            $user = User::create([
                'name' => $request->nom_fr . ' ' . $request->prenom_fr,
                'email' => $request->email,
                'password' => Hash::make($request->password), // ← SÉCURITÉ : Hasher le mot de passe
                'role' => 'student',
            ]);

            // Créer l'étudiant
            $eleve = Student::create([
                'nom_fr' => $request->nom_fr,
                'prenom_fr' => $request->prenom_fr,
                'nom_ar' => $request->nom_ar,
                'prenom_ar' => $request->prenom_ar,
                'tel' => $request->tel,
                'ville' => $request->ville,
                'email' => $request->email,
                'classe_id' => $request->classe_id,
                'password' => Hash::make($request->password), // ← SÉCURITÉ : Hasher aussi ici
                'user_id' => $user->id,
            ]);

            // Rediriger avec succès
            return redirect()->route('student-dash')
                ->with('success', 'Inscription réussie ! Bienvenue.');
                
        } catch (\Exception $e) {
            // En cas d'erreur, supprimer l'utilisateur créé (si existant)
            if (isset($user)) {
                $user->delete();
            }
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de l\'inscription. Veuillez réessayer.');
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
        $student = Student::findOrFail($id);
    
        $data = $request->only([
            'nom_fr',
            'prenom_fr',
            'nom_ar',
            'prenom_ar',
            'adresse',
            'ville',
            'gouvernorat',
            'tel',
            'tel2',
            'email',
            'date_naiss',
            'genre',
            'classe_id',
            'group_id',
            'status'
        ]);
    
        // 🔑 CORRECTION : Filtrer différemment pour garder la valeur 0
        $data = array_filter($data, function ($value) {
            // Garder les valeurs 0, '0', false
            if ($value === 0 || $value === '0' || $value === false) {
                return true;
            }
            // Pour les autres, enlever null et chaîne vide
            return $value !== null && $value !== '';
        });
    
        // 🔑 Password : si non vide => hashé & mis à jour
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }
    
        // 🔑 Si photo : upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $photoPath;
        }
    
        $student->update($data);
    
        return response()->json([
            'success' => true,
            'message' => "Mise à jour réussie",
            'data' => $student['id']
        ]);
    }
// update status
public function toggleStatus($id)
{
    $student = Student::find($id);
    
    if ($student) {
        // Basculer entre 0 et 1
        $student->status = $student->status == 1 ? 0 : 1;
        $student->save();
        
        return response()->json([
            'success' => true,
            'new_status' => $student->status
        ]);
    }
    
    return response()->json(['success' => false], 404);
}
    // public function update(Request $request, $id)
    // {
    //     $rules = array(
    //         'nom_fr'       => 'required',
    //         'prenom_fr'      => 'required',
    //         'specialite'      => 'required',
    //         'tel'      => 'required|numeric',
    //         'email'      => 'required',
    //         'password'      => 'required',
    //         'status'      => 'required',
    //          'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
    //          'user_id' =>'required'
    
    //     );
       
    //     $validator = Validator::make($request->all(), $rules);
    //     if ($validator->fails()) {
    //         return response()->json([
    //             'error' => true,
    //              'data' => $eleve 
    //                ]);
            
    //         // store new user
           
    //     } else {  
    //         $eleve=Student::find($id);
    //         $user=User::find($eleve->user_id);
            
    //         $user['name']=$request['nom_fr'];
    //         $user['email']=$request['email'];
    //         $user['password']=$request['password'];
    //         // $user['password_confirmation']=$request['password'];
    //         $user['role']='student';
    //         $user->save();
    //         $user=User::latest()->first();;
    //         // store new student
            
           
            
           
    //         $eleve->nom_fr = $request-> nom_fr;
    //         $eleve->prenom_fr = $request-> prenom_fr;
    //         $eleve->nom_ar = $request-> nom_ar;
    //         $eleve->prenom_ar = $request-> prenom_ar;
    //         $eleve->specialite      =  $request-> specialite;
    //         $eleve->tel      =  $request-> tel;
    //         $eleve->tel2      =  $request-> tel2;
    //         $eleve->email      =  $request-> email;
    //         $eleve->adresse      =  $request-> adresse;
    //         $eleve->bio      =  $request-> bio;
    //         // $eleve->photo      =  $request-> photo;
    //         $eleve->password      =  $request-> password;
    //         $eleve->status      =  $request-> status;
    //         $eleve->user_id      =  $user-> id;
            
    //         $eleve->save();
    
    //         // redirect
    //         return response()->json(['success' => true,    
    //                    ]); 
    //     }
        
    // }

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
