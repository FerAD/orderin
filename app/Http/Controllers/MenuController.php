<?php

namespace App\Http\Controllers;

use App\Dish_cat;
use App\Dishes;
use App\Men_cat;
use App\Menu;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class MenuController extends Controller
{

    /*
     * Get all the categories for a restaurant menu
     */
    public function getCategories($token, $idBranch) {
        $userToken = User::where('token',$token);
        if(is_null($userToken)){
            //return an error
            return response()->json(['error'=>'Error el token no se encuentra']);
        }else{
            $idMenu = Menu::where('idBranch',$idBranch)->pluck('idMenu');
            $categories = Men_cat::where('idMenu',$idMenu)->
                        leftjoin('categories','categories.idCategory','=','men_cat.idCategory')->
                        select('categories.name','categories.idCategory')->get();
            return $categories;
        }

    }

    /*
     *
     */
    public function getDishes($token,$idBranch,$idCategory){

        $userToken = User::where('token',$token);
        if(is_null($userToken)){
            //return an error
            return response()->json(['error'=>'Error el token no se encuentra']);
        }else{
            $dishes = Dish_cat::where('idCategory',$idCategory)->
                    leftjoin('dishes','dishes.idDish','=','dish_cat.idDish')->
                    where('dishes.idBranch',$idBranch)->
                    select('dishes.name','dishes.price','dishes.status','dishes.timeCook')->get();
            
            //$dish = Dishes::where('idBranch',$idBranch)->
                    
            return $dishes;
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
