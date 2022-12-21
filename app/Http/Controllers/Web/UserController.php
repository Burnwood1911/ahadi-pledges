<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\Card;
use App\Models\Jumuiya;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cards = Card::all()->where('assigned', false);


        $users = User::with(['jumuiya', 'card'])
            ->filter(request(['tag']))
            ->simplePaginate(15);

        return view('members', ['data' => $users, 'cards' => $cards]);
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
            'card_id' => 'required',
            'email' => 'required',
            'jumuiya_id' => 'required',
            'password' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'date_of_birth' => 'required'
        ]);

        $user = User::create($request->all());
        Card::find($request['card_id'])->update([
            'assigned' => true
        ]);

        return redirect('/members');
    }

    public function uploadusers(Request $request)
    {

       
            Excel::import(new UsersImport, $request->file('file'));

            return redirect('/members');
    }


    public function assign(Request $request, $id)
    {
        $cardid = request('card_id');

        Card::where('id', $cardid)->update([
            'assigned' => true
        ]);

        User::where('id', $id)->update($request->all());

        return redirect('/members');
    }

    public function update(Request $request, $id)
    {
        $fields = Arr::except($request->all(),['_token']);

        $user = User::find($id);

        Card::where('id', $user->card_id)->update([
            'assigned' => false
        ]);

        Card::where('id', $fields['card_id'])->update([
            'assigned' => true
        ]);


        User::where('id', $id)->update($fields);

        return redirect('/members');
    }

    public function show($id)
    {
        $user = User::with('jumuiya')->find($id);
        $jumuiyas = Jumuiya::all();
        $cards = Card::all()->where('assigned', false);
        return view('members.edit', [
            'data' => $user,
            'jumuiyas' => $jumuiyas, 'cards' => $cards
        ]);
    }

    public function create()
    {
        $jumuiyas = Jumuiya::all();
        $cards = Card::all()->where('assigned', false);
        return view(
            'members.create',
            ['jumuiyas' => $jumuiyas, 'cards' => $cards]
        );
    }


    public function selectSearch(Request $request)
    {
    	$users = [];

        if($request->has('q')){
            $search = $request->q;
            $users = User::
                where('first_name', 'LIKE', "%$search%")
                ->orWhere('second_name', 'LIKE', "%$search%")
                ->orWhere('last_name', 'LIKE', "%$search%")->get();

        }else {
            $users = User::all();
        }
        return response()->json($users);
    }

    public function disable($id)
    {
        $user = User::find($id);

        if ($user->enabled) {
            User::where('id', $id)->update([
                'enabled' => false
            ]);
        } else {
            User::where('id', $id)->update([
                'enabled' => true
            ]);
        }

        return redirect('/members');
    }



    public function destroy($id)
    {
        $user = User::find($id);
        Card::find($user->card_id)->update([
            'assigned' => false
        ]);
        User::destroy($id);

        return redirect('/members');
    }
}
