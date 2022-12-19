<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Pledge;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response(Payment::all());

    }

     /**
     * Display a listing of the resource for given user.
     *
     * @return \Illuminate\Http\Response
     */
    public function users($id)
    {
        
        $user = User::find($id);
        $pledges = $user->pledges;

        $payments = [];

        foreach($pledges as $pledge){

            $pays = $pledge->payments;

            foreach($pays as $p){

                array_push($payments, $p);

            }

        }
       return Response($payments);
    }

    /**
     * Display a listing of the resource for given pledge.
     *
     * @return \Illuminate\Http\Response
     */
    public function pledge($id)
    {
        $payments = Payment::where('pledge_id', $id)->get();
        return Response($payments);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required',
            'pledge_id' => 'required',
            'payment_date' => 'required',
            'payment_method_id' => 'required'
        ]);

        $pledge = Pledge::find($validated['pledge_id']);

        $pledge->payments()->create($validated);

        return Response([
            'message' => 'Successfuly created'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Response(Payment::where('id', $id)->get());

    }

   
}
