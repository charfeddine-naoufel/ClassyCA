<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Student;
use App\Models\Classe;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $eleves=Student::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Créer un tableau avec 12 cases (1 pour chaque mois) initialisé à 0
        $Inscrit = array_fill(1, 12, 0);
        
        // Remplir le tableau avec les valeurs récupérées de la base de données
        foreach ($eleves as $registration) {
            $Inscrit[$registration->month] = $registration->count;
        }
        $elevesA=Student::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->where('status',1)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Créer un tableau avec 12 cases (1 pour chaque mois) initialisé à 0
        $Active = array_fill(1, 12, 0);
        
        // Remplir le tableau avec les valeurs récupérées de la base de données
        foreach ($elevesA as $registration) {
            $Active[$registration->month] = $registration->count;
        }
        $ElActive = array_values($Active);
        $ElInscrit = array_values($Inscrit);
        //tableau d'eleves par classes
        $classes=Classe::all();
        $Elclasse=[];
        foreach ($classes as $classe) {
            $Elclasse[]=[$classe->eleves->count(),$classe->slug];
        }
        // dd(json_encode($Elclasse));
      return view('Admin.home',compact('user','ElInscrit','ElActive','Elclasse'));
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
