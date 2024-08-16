<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Zoominvitation;
use Auth;
use Jubaer\Zoom\Facades\Zoom;
use App\Models\Course;
use App\Models\Group;
use App\Models\Live; // Assurez-vous d'importer votre modèle Live

class LiveController extends Controller
{
    public function index()
    {
          
        $teacher=Auth::user()->teacher;
         // Récupérer les groupes associés à cet enseignant
         $groups = $teacher->groups;
        
        $chapitres=collect();
        $courses=Course::where('teacher_id',Auth::user()->teacher->id)->get();
        foreach ($courses as $key => $course) {
            $chapitres=$chapitres->merge($course->chapitres);
            
        }
       
        $livessuiv = Live::where('teacher_id',Auth::user()->teacher->id)->where('start_time','>=',now())->orderBy('start_time')->get();
        $livespred = Live::where('teacher_id',Auth::user()->teacher->id)->where('start_time','<',now())->orderBy('start_time')->get();
        return view('Teacher.Lives.index',compact('livessuiv','livespred','courses','chapitres','groups'));
    }

    public function store(Request $request)
    {
        
        $meeting = Zoom::createMeeting([
            'topic' => $request->topic,
                'start_time' => $request->start_time,
                'duration' => $request->duration,
                'description' => $request->description,
                'settings' => [
                    'join_before_host' => true,
                    'mute_upon_entry' => true,
                ],
            ]);
            
        
        // dd($meeting['data']['join_url']);
            // Enregistrer les détails de la réunion dans la base de données
            $live=Live::create([
                'topic' => $request->input('topic'),
                'start_time' => $request->input('start_time'),
                'duration' => $request->input('duration'),
                'description' => $request->input('description'),
                'join_url' => $meeting['data']['join_url'],
                'start_url' => $meeting['data']['start_url'],
                'meeting_id' => $meeting['data']['id'],
                'course_id' => $request->course_id,
                'chapitre_id' => $request->chapitre_id,
                'group_id' => $request->group_id,
                'teacher_id' => $request->teacher_id,
            ]);
             
        // envoi des emails aux eleves du groupe
        $teacher=Auth::user()->teacher;
        $group = Group::where('id',$request->group_id)->first();
        $students=$group->students;
        
          // Envoyer les invitations par email
        foreach ($students as $student) {
            Mail::to($student->email)->send(new Zoominvitation($live));
        }    
                          
            return redirect()->route('lives.index')->with('success', 'Réunion créée avec succès!');
        
        
    }

    public function edit($id)
    {
        // Récupérer les détails de la réunion depuis votre base de données
        $live = Live::findOrFail($id);

        return response()->json([
            'success' => true,
             'data' => $live 
               ]);
    }

    public function update(Request $request, $id)
    {
        
        
        // Mettre à jour les détails de la réunion dans Zoom et dans votre base de données
        $meeting = Zoom::getMeeting($request->meeting_id);
        
        $meeting = Zoom::updateMeeting($meeting['data']['id'], [
            'topic' => $request->topic,
            'start_time' => $request->start_time,
            'duration' => $request->duration,
            'description' => $request->description,
            'settings' => [
                'join_before_host' => true,
                'mute_upon_entry' => true,
            ],
        ]);
       
        
        // Mettre à jour les détails dans la base de données locale
        $live = Live::findOrFail($id);
        $live->update([
            'topic' => $request->topic,
            'start_time' => $request->start_time,
            'duration' => $request->duration,
            'description' => $request->description,
            'course_id' => $request->course_id,
            'chapitre_id' => $request->chapitre_id,
            'group_id' => $request->group_id,
        ]);

        return response()->json(['success' => true,  ]);    
 }

 /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $live=Live::find($id);
        $meeting = Zoom::deleteMeeting($live->meeting_id);
        $live->delete();
    
        return redirect()->route('lives.index')
                        ->with('Delete','Live supprimée avec succés');
    }
}
