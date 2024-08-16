<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class SupportController extends Controller
{
    
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supports = Support::all();
        $chapitres = Auth::user()->teacher->chapitres;

        // dd($supports);
        return view('Teacher.Documents.index',compact('supports','chapitres'));
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
        'student_id'       => 'required',
        'method'      => 'required',
        'montant'      => 'required',
        'date_pay'      => 'required'
    );
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect()->route('supports.index')
        ->with('Error','Vérifiez vos champs.');
    } else {
        // store
        $support = new Support;
        $support->student_id = $request-> student_id;
        $support->method      =  $request-> method;
        $support->montant      =  $request-> montant;
        $support->date_pay      =  $request-> date_pay;
        
        $support->save();
        Student::whereId($support->student_id)->update(['status'=>1]);

        // redirect
        return redirect()->route('supports.index')
        ->with('success','Nouveau support crée avec succés.');
    }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    { 
        $support = Support::find($id); 
                return response()->json([
                               'success' => true,
                                'data' => $support 
                                  ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Support $support)
    {
        
        
               $rules = array(
                'student_id'       => 'required',
                'method'      => 'required',
                'montant'      => 'required',
                'date_pay'      => 'required'
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->route('supports.index')
                ->with('Error','Vérifiez vos champs.');
            } else {
                // update
                // $support = Support::find($id);
                $support->student_id = $request-> student_id;
                $support->method      =  $request-> method;
                $support->montant      =  $request-> montant;
                $support->date_pay      =  $request-> date_pay;
                
                $support->save();
        
                // redirect
                // return redirect()->route('supports.index')
                // ->with('success','Matière modifiée avec succés.');

                return response()->json(['success' => true,    
                       ]); 
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Support $support)
    {
        $support->delete();
        Student::whereId($support->student_id)->update(['status'=>0]);
    
        return redirect()->route('supports.index')
                        ->with('success','Support supprimé avec succés');
    }
}
