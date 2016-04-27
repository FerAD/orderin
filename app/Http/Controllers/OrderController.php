<?php

namespace App\Http\Controllers;

use App\Order;
use App\Dish_ord;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use App\Http\Requests;


class OrderController extends Controller
{
    
    public function createOrder($idUser,$idBranch,$userToken){
        $userToken = User::where('token',$userToken);
        if(is_null($userToken)){
            //return an error
            return response()->json(['error'=>'Error el token no se encuentra']);
        }else{
            $inputJSON = file_get_contents('php://input');
            $dishesArray= json_decode( $inputJSON, TRUE ); //convert JSON into array

            //get the price of the order.
            $price = 0.0;
            foreach($dishesArray as $dish){
                $dishInOrder = DB::table('dishes')->where('idDish', $dish['dish'])->first();
                $price += $dishInOrder->price;
                if($dish['topping'] != 0){
                    $toppingInOrder = DB::table('toppings')->where('idTopping',$dish['topping'])->first();
                    $price += $toppingInOrder->price;
                }


            }
            //token order
            $uuid = (string)Uuid::uuid4();
            //default idPayment
            $defaultIdPayment = 2;
            $order = new Order([
                'token' => $uuid,
                'idUser' => $idUser,
                'idBranch' => $idBranch,
                'idPaymentType' => $defaultIdPayment,
                'status' => 0,
                'price' => $price,
            ]);
            $order->save();

            //create the dishes of the order
            foreach($dishesArray as $dish){
                $dishOrder = new Dish_ord([
                    'idDish' => $dish['dish'],
                    'tokenOrder' => $order->token,
                    'idTopping' => $dish['topping']
                ]);
                $dishOrder->save();
            }

            //return an error
            return response()->json(['success'=>'Tu orden está en proceso, espera la notificación para pasar a pagar. :)']);
        }

    }
    
    public function getMyOrders($idUser,$userToken){
        $userToken = User::where('token',$userToken);
        if(is_null($userToken)){
            //return an error
            return response()->json(['error'=>'Error el token no se encuentra']);
        }else{
            $orders = Order::where('idUser',$idUser)
                    ->join('paymentTypes','paymentTypes.idPaymentType','=','orders.idPaymentType')
                    ->join('dish_ord','dish_ord.tokenOrder','=','orders.token')
                    ->join('branches','branches.idBranch','=','orders.idBranch')
                    ->join('restaurants','restaurants.idRestaurant','=','branches.idRestaurant')
                    ->join('dishes','dishes.idDish','=','dish_ord.idDish')
                    ->join('toppings','toppings.idTopping','=','dish_ord.idTopping')
                    ->select('orders.token as orderToken','orders.price as orderPrice',
                             'paymentTypes.name as paymentType',
                             'restaurants.name as restaurantName', 'restaurants.imageUrl as restaurantImage',
                             'dishes.name as dishName','dishes.price as dishPrice',
                             'toppings.name as toppingName','toppings.price as toppingPrice')
                    ->get();

            return $orders;
        }
    }

    public function orderReady($orderToken){
        //get the user id
        $userId = Order::where('token',$orderToken)->pluck('idUser');
        //get the data of the user
        $user = User::where('idUser',$userId)->first();


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
