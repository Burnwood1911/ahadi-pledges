<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Jumuiya;
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
        $users = User::with(['jumuiya'])->get();
    
        return view('members', ['data' => $users]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request['role_id'] = "1";

        $validated = $request->validate([
            'first_name' => 'required',
            'second_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'jumuiya_id' => 'required',
            'password' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'date_of_birth' => 'required'
        ]);


        $user = User::create($request->all());

        return redirect('/members');
    }


    public function update(Request $request, $id)
    {


        $validated = $request->validate([
            'first_name' => 'required',
            'second_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'jumuiya_id' => 'required',
            'password' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'date_of_birth' => 'required'
        ]);


        User::where('id', $id)->update($validated);

        return redirect('/members');
    }

    public function show($id)
    {
        $user = User::with('jumuiya')->find($id);
        $jumuiyas = Jumuiya::all();
        $cards = Card::all();
        return view('members.edit', ['data' => $user,
    'jumuiyas' => $jumuiyas,'cards' => $cards]);
    }

    public function create()
    {
        $jumuiyas = Jumuiya::all();
        $cards = Card::all();
        return view('members.create', [
    'jumuiyas' => $jumuiyas, 'cards' => $cards]);
    }



    public function destroy($id)
    {
        User::destroy($id);

        return redirect('/members');
    }


}
