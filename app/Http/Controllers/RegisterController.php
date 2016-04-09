<?php

namespace App\Http\Controllers;

use App\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //rules for the form data
        $rules = array(
            'name' => 'required|max:150',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        );

        $data = $request->all();

        //validator
        $v =  Validator::make($data,$rules);

        //if validator fails
        if($v -> fails()){
            return response()->json($v->errors());

        }else {
            //token API access
            $uuid = (string)Uuid::uuid4();
            //create the new user
            $user = new User([
                'name' => $data['name'],
                'email' => $data['email'],
                'status' => 1,
                'password' => bcrypt($data['password']),
                'token' => $uuid,
            ]);
            $user->save();

            return response()->json(['token'=>$user->token]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
?>
