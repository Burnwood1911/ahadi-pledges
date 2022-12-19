<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response(User::all());
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
            'first_name' => 'required',
            'second_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            'jumuiya_id' => 'required',
            'password' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'date_of_birth' => 'required',
            'disabled' => 'required',
        ]);

        $user = User::create($validated);

        $token = $user->createToken($request->input('device_name'))->plainTextToken;

        return Response([
            'message' => 'Successfuly created',
            'token' => $token
        ], 201);
    }
}
