<?php

namespace App\Http\Controllers;

use App\Models\Jumuiya;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\Logging\Junit;

class JumuiyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        if ($request->wantsJson()) {
            return Response(Jumuiya::all());
        }
      
        
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
            'name' => 'required',
        ]);

        Jumuiya::create($validated);

        return Response([
            'message' => 'Successfuly created'
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jumuiya  $jumuiya
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Response(Jumuiya::where('id', $id)->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jumuiya  $jumuiya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        Jumuiya::where('id', $id)->update($validated);

        return Response([
            'message' => 'Successfuly updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jumuiya  $jumuiya
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jumuiya::destroy($id);

        return Response(['message' => 'Successfuly deleted'], 200);
    }
}
