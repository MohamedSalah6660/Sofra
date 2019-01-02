<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderProduct;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(5);

        return view('admin.order.index' , compact('orders'));        


    }

    public function show($id)
    {

        $orders = Order::findOrFail($id);


        $order_product = $orders->products->all();
            
        return view('admin.order.show', compact('orders' , 'order_product'));


    }

   
}
