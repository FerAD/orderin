<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    /*
     *
     */
    public function normalLogin(Request $request){

        //data
        $data = $request->all();

        //rules for the form data
        $rules = array(
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        );

        //validator
        $v =  Validator::make($data,$rules);

        //if validator fails
        if($v -> fails()){
            return response()->json($v->errors());

        }else {

            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                $user = User::where('email', $data['email'])->first();
                //return the user token
                return response()->json($user->token);
            } else {
                //return an error
                return response()->json(['error'=>'Error, este usuario no tiene permisos']);
            }
        }
    }

    /*
     *
     */
    public function facebookLogin(Request $request){

        //get all the data
        $data = $request->all();
        //validate if the user exists with that fb_id
        $user_validate = User::where('facebook_id',$data['fb_id']);

        //if not register already
        if(is_null($user_validate)){
            //evaluate the email
            $unique_email = User::where('email',$data['email']);
            if(is_null($unique_email)){
                //token API access
                $uuid = (string)Uuid::uuid4();
                //create the new user
                $user = new User([
                    'name' => $data['user'],
                    'email' => $data['email'],
                    'status' => 1,
                    'password' => bcrypt($data['fb_id']),
                    'token' => $uuid,
                ]);
                $user->save();
                //return the user token
                return response()->json(['token'=>$user->token]);
            }else{
                //return error message
                return response()->json(['error'=>'Este email ya está registrado']);
            }
        //if the user is already registed
        }else{
            //return user token
            return response()->json(['token'=>$user_validate->token]);
        }
    }

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
