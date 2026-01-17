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
use App\Models\Live;
use App\Models\User;
use Illuminate\Validation\Rule;
use Auth;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::with('user')->orderBy('created_at', 'desc')->paginate(15);;
        return view('Admin.Enseignant.index', compact('teachers'));
        
    }
    public function mescours()
    {
        $user = Auth::user();

        if ($user && $user->teacher) {
            $courses = Course::where('teacher_id', $user->teacher->id)->get();
        } else {
            $courses = collect(); 
        }
    //    dd($courses);
       $matieres=Matiere::all();
       $groups=Group::all();
       $classes=Classe::all();
      return view('Teacher.courses.index',compact('courses','matieres','groups','classes'));
    }
    // public function mesgroups()
    // {
    //     $user = Auth::user();

    //     if ($user && $user->teacher) {
    //         $courses = Course::where('teacher_id', $user->teacher->id)->get();
    //     } else {
    //         $courses = collect(); 
    //     }
        
    //    $groups=[];
    //    foreach ($courses as $key => $course) {
    //        $groups[$course->group_id]=Group::where('id',$course->group_id)->get();
    //    }
    //   dd($groups);
       
    //   return view('Teacher.group.mesgroups',compact('groups'));
    // }

    public function mesgroups()
{
    $user = Auth::user();
    
    // Vérification plus complète de l'utilisateur et de sa relation teacher
    if (!$user || !$user->teacher) {
        return view('Teacher.group.mesgroups', ['groups' => collect()]);
    }
    
    // Récupérer les groupes distincts via une relation
    $groups = Group::whereHas('courses', function($query) use ($user) {
            $query->where('teacher_id', $user->teacher->id);
        })
        ->with(['courses' => function($query) use ($user) {
            $query->where('teacher_id', $user->teacher->id);
        }])
        ->get();
    // dd($groups);
    return view('Teacher.group.mesgroups', compact('groups'));
}

// fonction calendrier
public function calendrier()
{
    $user = Auth::user();
    
    if (!$user || !$user->teacher) {
        return view('Teacher.calendrier', ['events' => []]);
    }
    
    // Récupérer les lives via les cours de l'enseignant
    $meetings = Live::where('start_time', '>=', now())
        ->whereHas('course', function($query) use ($user) {
            $query->where('teacher_id', $user->teacher->id);
        })
        ->with(['course.matiere', 'group'])
        ->orderBy('start_time', 'asc')
        ->get();
    
    $events = [];
    $colorMap = [
        'Eco' => '#4caf50',
        'Gest' => '#d22346',
        'Info' => '#ffc107',
    ];
    
    foreach ($meetings as $meeting) {
        if (!$meeting->course || !$meeting->course->matiere) {
            continue;
        }
        
        $matiereLabel = $meeting->course->matiere->label_matiere;
        $groupName = $meeting->group ? $meeting->group->nomg : 'Groupe inconnu';
        
        $title = $matiereLabel . ' - ' . $meeting->topic . ' (' . $groupName . ')';
        
        $events[] = [
            'title' => $title,
            'start' => $meeting['start_time'],
            'end' => Carbon::parse($meeting['start_time'])->addMinutes(60),
            'color' => $colorMap[$matiereLabel] ?? '#757575',
            'url' => $meeting['start_url'] ?? '#',
            'extendedProps' => [
                'group' => $groupName,
                'matiere' => $matiereLabel,
                'topic' => $meeting->topic,
                'meeting_id' => $meeting->id,
            ],
        ];
    }
    
    return view('Teacher.calendrier', compact('events'));
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
        ->with('success','Nouveau enseignant crée avec succés.');
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
 * Toggle the status of a teacher.
 */
public function toggleStatus($id)
{
    try {
        $teacher = Teacher::findOrFail($id);
        
        // Inverser le statut (1 → 0, 0 → 1)
        $teacher->status = $teacher->status == "1" ? "0" : "1";
        $teacher->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Statut mis à jour avec succès',
            'status' => $teacher->status
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Erreur lors du changement de statut: ' . $e->getMessage()
        ], 500);
    }
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $teacher = Teacher::find($id); 
    
    if (!$teacher) {
        return response()->json([
            'success' => false,
            'message' => 'Enseignant non trouvé'
        ], 404);
    }
    
    return response()->json([
        'success' => true,
        'data' => $teacher 
    ]);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $teacher = Teacher::findOrFail($id);
            $user = User::findOrFail($teacher->user_id);

            $rules = [
                'nom_fr'       => 'required|string|max:255',
                'prenom_fr'    => 'required|string|max:255',
                'specialite'   => 'required|string|max:255',
                'tel'          => 'required|numeric|digits_between:8,15',
                'email'        => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($user->id),
                    Rule::unique('teachers')->ignore($teacher->id),
                ],
                'password'     => 'nullable|min:8',
                'status'       => 'required|in:0,1',
                'photo'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'nom_ar'       => 'nullable|string|max:255',
                'prenom_ar'    => 'nullable|string|max:255',
                'tel2'         => 'nullable|numeric|digits_between:8,15',
                'adresse'      => 'nullable|string|max:500',
                'bio'          => 'nullable|string',
            ];

            $messages = [
                'email.unique' => 'Cet email est déjà utilisé.',
                'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
                'tel.digits_between' => 'Le numéro de téléphone doit contenir entre 8 et 15 chiffres.',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur de validation',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Mise à jour utilisateur
            $userData = [
                'name' => $request->nom_fr,
                'email' => $request->email,
            ];

            if ($request->filled('password')) {
                $userData['password'] = Hash::make($request->password);
            }

            $user->update($userData);

            // Mise à jour photo
            if ($request->hasFile('photo')) {
                if ($teacher->photo && Storage::disk('public')->exists($teacher->photo)) {
                    Storage::disk('public')->delete($teacher->photo);
                }
                
                $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
                $photoPath = $request->file('photo')->storeAs('images/teachers/photo', $fileName, 'public');
                $teacher->photo = $photoPath;
            }

            // Mise à jour enseignant
            $teacherData = [
                'nom_fr'       => $request->nom_fr,
                'prenom_fr'    => $request->prenom_fr,
                'nom_ar'       => $request->nom_ar,
                'prenom_ar'    => $request->prenom_ar,
                'specialite'   => $request->specialite,
                'tel'          => $request->tel,
                'tel2'         => $request->tel2,
                'email'        => $request->email,
                'adresse'      => $request->adresse,
                'bio'          => $request->bio,
                'status'       => $request->status,
            ];

            if ($request->filled('password')) {
                $teacherData['password'] = Hash::make($request->password);
            }

            $teacher->update($teacherData);

            return response()->json([
                'success' => true,
                'message' => 'Enseignant mis à jour avec succès',
                'teacher' => $teacher->fresh(['user'])
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour: ' . $e->getMessage()
            ], 500);
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
