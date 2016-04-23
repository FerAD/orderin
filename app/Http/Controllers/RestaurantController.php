<?php

namespace App\Http\Controllers;

use App\Branch;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class RestaurantController extends Controller
{

    public function listingCloser($token)
    {
        $valid_user = User::where('token',$token)->first();

        if (!is_null($valid_user)){
            $restaurants = Branch::orderby('name')
                        ->leftjoin('restaurants','restaurants.idRestaurant','=','branches.idRestaurant')
                        ->select('restaurants.idRestaurant as idRestaurant', 'branches.idBranch as idBranch',
                        'restaurants.imageUrl as image','branches.latitude as lat','branches.longitude as long',
                        'restaurants.name as name')->get();

            return $restaurants;
        }else{
            //return error message
            return response()->json(['error'=>'Error con el token del usuario']);
        }
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

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
