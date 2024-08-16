<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::all();
        $students = Student::all();

        // dd($payments);
        return view('Admin.Payment.index',compact('payments','students'));
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
        return redirect()->route('payments.index')
        ->with('Error','Vérifiez vos champs.');
    } else {
        // store
        $payment = new Payment;
        $payment->student_id = $request-> student_id;
        $payment->method      =  $request-> method;
        $payment->montant      =  $request-> montant;
        $payment->date_pay      =  $request-> date_pay;
        
        $payment->save();
        Student::whereId($payment->student_id)->update(['status'=>1]);

        // redirect
        return redirect()->route('payments.index')
        ->with('success','Nouveau payment crée avec succés.');
    }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    { 
        $payment = Payment::find($id); 
                return response()->json([
                               'success' => true,
                                'data' => $payment 
                                  ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        
        
               $rules = array(
                'student_id'       => 'required',
                'method'      => 'required',
                'montant'      => 'required',
                'date_pay'      => 'required'
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->route('payments.index')
                ->with('Error','Vérifiez vos champs.');
            } else {
                // update
                // $payment = Payment::find($id);
                $payment->student_id = $request-> student_id;
                $payment->method      =  $request-> method;
                $payment->montant      =  $request-> montant;
                $payment->date_pay      =  $request-> date_pay;
                
                $payment->save();
        
                // redirect
                // return redirect()->route('payments.index')
                // ->with('success','Matière modifiée avec succés.');

                return response()->json(['success' => true,    
                       ]); 
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        Student::whereId($payment->student_id)->update(['status'=>0]);
    
        return redirect()->route('payments.index')
                        ->with('success','Payment supprimé avec succés');
    }
}
