<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pledge;
use App\Models\PledgeType;
use App\Models\Purpose;
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
        $pledges = Pledge::with([])->filter(request(['tag']))
        ->simplePaginate(15);
        $purposes = Purpose::all();
        return view('pledges', ['pledges' => $pledges,
        'purposes' => $purposes]);
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


    public function create()
    {
        $purposes = Purpose::all();
        $users = User::all();
        $pledge_types = PledgeType::all();

        return view(
            'pledges.create',
            [
                'purposes' => $purposes,
                'users' => $users,
                'pledge_types' => $pledge_types
            ]
        );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());

        $user = User::find($request['livesearch']);

        $user->pledges()->create([
            "amount" => $request['amount'],
            "description" => $request['description'],
            "purpose_id" => $request['purpose_id'],
            "pledge_type_id" => $request['pledge_type_id'],
            "deadline" => $request['deadline']
        ]);

        return redirect('/pledges');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pledge  $pledge
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $pledge = Pledge::find($id);
        $purposes = Purpose::all();
        $pledge_types = PledgeType::all();

    
        return view('pledges.edit', [
            'pledge' => $pledge,
            'purposes' => $purposes,
            'pledge_types' => $pledge_types
           
        ]);
    }

    public function createPurpose(Request $request){

        $validated = $request->validate([
            'title' => 'required',
        ]);

        Purpose::create($validated);

        return redirect('/pledges');
    }

    public function deletePurpose($id)
    {
        Purpose::destroy($id);

        return redirect('/pledges');
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
            'deadline' => 'required',
            'purpose_id' => 'required',
            'pledge_type_id' => 'required'
        ]);

        Pledge::where('id', $id)->update($validated);

        return redirect('/pledges');
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

        return redirect('/pledges');
    }
}
