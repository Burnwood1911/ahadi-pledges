<?php

namespace App\Http\Controllers;

use App\Models\PledgeType;
use Illuminate\Http\Request;

class PledgeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response(PledgeType::all());

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
            'title' => 'required',
        ]);

        PledgeType::create($validated);

        return Response([
            'message' => 'Successfuly created'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PledgeType  $pledgeType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Response(PledgeType::where('id', $id)->get());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PledgeType  $pledgeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
        ]);

        PledgeType::where('id', $id)->update($validated);

        return Response([
            'message' => 'Successfuly updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PledgeType  $pledgeType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PledgeType::destroy($id);

        return Response(['message' => 'Successfuly deleted'], 200);
    }
}
