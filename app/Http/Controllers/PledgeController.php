<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pledge;
use Illuminate\Http\Request;

class PledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response(Pledge::all());
    }

    /**
     * Display a listing of the resource for given user.
     *
     * @return \Illuminate\Http\Response
     */
    public function users($id)
    {
        $pledges = Pledge::where('user_id', $id)->get();
        return Response($pledges);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'description' => 'required',
            'amount' => 'required',
            'pledge_type_id' => 'required',
            'purpose_id' => 'required',
            'deadline' => 'required'
        ]);

        $user = User::find($id);

        $user->pledges()->create($validated);

        return Response([
            'message' => 'Successfuly created'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pledge  $pledge
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Response(Pledge::where('id', $id)->get());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pledge  $pledge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'description' => 'required',
            'amount' => 'required',
        ]);

        Pledge::where('id', $id)->update($validated);

        return Response([
            'message' => 'Successfuly updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pledge  $pledge
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pledge::destroy($id);

        return Response(['message' => 'Successfuly deleted'], 200);
    }
}
