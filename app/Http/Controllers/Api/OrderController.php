<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::with('user')->latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id'=>'required|digits:20',
            'status'=>'required|in:0,1,2',
            'currency_id'=>'required|digits:10',
            'address_id'=>'required|digits:20',
            //'sum'=>'',

        ]);
        $order = Order::create([
            'user_id'=>$request['user_id'],
            'status'=>$request['status'],
            'currency_id'=>$request['currency_id'],
            'sum'=>$request['sum'],
            'address_id'=>$request['address_id'],
        ]);
        foreach ($request->input('products') as $product){
            $order->products()->attach([
                $product['id']=>['price'=>$product['price'], 'pieces'=>$product['pieces']]
            ]);
        }
        return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Order::with(['products', 'currency', 'user', 'address'])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $this->validate($request,[
            'user_id'=>'required|digits:20',
            'status'=>'required|in:0,1,2',
            'currency_id'=>'required|digits:10',
            'address_id'=>'required|digits:20',
            //'sum'=>'',

        ]);
        $order->update($request->all());
        return ['message'=>'Order Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return ['message'=>'Order Deleted'];
    }

}
