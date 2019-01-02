<?php

namespace App\Http\Controllers\Api\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use App\Setting;
use App\Product;
use App\Comment;
use App\Order;
use App\Offer;
use App\Restaurant;

class MainController extends Controller
{

    public function clients(){


		$clients = Client::paginate(5);

		return responseJson(1, 'success', $clients);


	}


    public function product_details(Request $request){

    	$product = Product::find($request->id);

        return responseJson(1,'success',$product);

    }

    public function create_comment(Request $request)
    {
        $validator = validator()->make($request->all(),[

            'body'=>'required',
            'rate'=>'required|numeric',
            'restaurant_id'=>'required',


        ]);

        $comment = $request->user()->orders()->where('restaurant_id' , $request->restaurant_id)->where('status','delivered')->count();

        if ($comment > 0) {

            $comments = $request->user()->comments()->create($request->all());

            return responseJson(1,'تم اضافه التعليق',$comments);

        }else{

            return responseJson(0,'لا يمكن اضافه تعليق');

        }    


    }


    public function comments(Request $request){

    	$comments = Comment::where('restaurant_id' , $request->restaurant_id)->paginate(5);


        return responseJson(1,'success',$comments);

    }


    public function offers(){

        $offers = Offer::paginate(5);

        return responseJson(1, 'success' , $offers);

    }


    public function restaurant_info(Request $request)
    {

        $info = Restaurant::find($request->id);

        return responseJson(1, 'success' , $info);        

    }

    public function show_offer(Request $request)
    {

        $offer = Offer::find($request->id);

        return responseJson(1, 'success', $offer);

    }


    public function my_orders(Request $request)
    {

        $orders = $request->user()->orders()->paginate(5);

        return responseJson(1, 'success' , $orders);

    }


   public function show_order(Request $request)
    {

        $orders = $request->user()->orders()->find($request->id);

        return responseJson(1, 'success' , $orders);

    }

    public function create_order(Request $request)
    {
        $validation = validator()->make($request->all(),[

            'restaurant_id' => 'required|exists:restaurants,id',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required',
            'payment_method_id' => 'required'

        ]);

        if ($validation->fails()) {
            
            $data = $validation->errors();
            return responseJson(0, $validation->errors()->first() , $data);
        }


        $restaurant = Restaurant::find($request->restaurant_id);

        if ($restaurant->status == 'close')
        {
           
            return responseJson(0 , 'عذرا المطعم غير متاح حاليا');

        }   

        $order = $request->user()->orders()->create([

            'restaurant_id' => $request->restaurant_id,
            'notes' =>$request->notes,
            'status' => 'pending',
            'payment_method_id' => $request->payment_method_id,
        ]);

        $cost = 0;

        $delivery = $restaurant->delivery_fee;

        foreach ($request->products as $pro) 
        {
            $product = Product::find($pro['product_id']);
          
            $readyProduct = [

                $pro['product_id'] => [

                    'quantity' => $pro['quantity'],
                    'price' => $product->price,
                    'special_order' => (isset($pro['special_order'])) ? $pro['special_order'] : ''
                ]
            ];

            $order->products()->attach($readyProduct);

            $cost += ($product->price * $pro['quantity']);
        }

        $setting = Setting::find(1);

        if ($cost >= $restaurant->minimum)
        {
            $total = $cost + $delivery;

            $commission = $setting->commission * $cost/100;

            $net = $total - $commission;


            $update = $order->update([

                'cost' =>$cost,
                'delivery' => $delivery,
                'total' => $total,
                'commission' => $commission,
                'net' => $net,
                
            ]);
        // Create Notification

            $restaurant->notifications()->create([

                'title' => 'لديك طلب جديد',
                'title_en' => 'You Have New Order',
                'body' => 'لديك طلب جديد من العميل '.$request->user()->name,
                'body_en' => 'You Have New Order by Client'.$request->user()->name,
                'order_id' => $order->id,



            ]);


            $tokens = $restaurant->tokens()->where('token', '!=' ,'')->pluck('token')->toArray();
           // $audience = ['include_player_ids' => $tokens];

            $body  = [

                'en' => 'You Have New Order by Client'.$request->user()->name,
                'ar' => 'لديك طلب جديد من العميل '.$request->user()->name

            ];

            $title = $restaurant->title;
          /*  $send = notifyByOneSignal($audience , $body ,[
                'user_type' => 'restaurant',
                'action' => 'New Order',
                'order_id' => $order->id,
            ]);
*/
            $data =[

                'user_type' => 'restaurant',
                'action' => 'New Order',
                'order_id' => $order->id,
            ];

          //  info(json_encode($data));
            $send = notifyByFirebase($title, $body, $tokens, $data, $is_notification =true);
           // info("firebase result: " .$send);

            $order_product = [

                'order' => $order->fresh()->load('products')
            ];    

                return responseJson(1, 'تم الطلب بنجاح' , [$order_product, $send]);
       

        }else {
            
            $order->delete();

            return responseJson(0 , 'الطلب يجب ان يكون اكثر من '.$restaurant->minimum.'ريال');

        }

    }


   
    public function delivered(Request $request, $id)
    {

    $order = $request->user()->orders()->find($id);

        if($order->status = 'prepared') {


        $order->status = 'delivered';
        $order->update(['status' => 'delivered']);

// Create Notify

        $restaurant = $order->restaurants;

        $restaurant->notifications()->create([

            'title' => 'تم تسليم الطلب',
            'title_en' => 'Order Is Delivered',
            'body' => 'تم تسليم الطبب من العميل '.$request->user()->name,
            'body_en' => 'Order Is Delivered by'.$request->user()->name,
            'order_id' => $order->id,



        ]);


        $tokens = $restaurant->tokens()->where('token', '!=' ,'')->pluck('token')->toArray();
        if (count($tokens)) {
            $body  = [

            'en' => 'Order Is Delivered'.$request->user()->name,
            'ar' => 'تم تسليم  الطلب'.$request->user()->name

        ];

        $title = $restaurant->title;
    
        $data =[

            'user_type' => 'restaurant',
            'action' => 'Order Delivered',
            'order_id' => $order->id,
        ];

        $send = notifyByFirebase($title, $body, $tokens, $data, $is_notification =true);
            
        }


            return responseJson(1, 'تم تسليم الطلب', [
                'order' => $order,
                'notify'=> $send??null
            ] );
        }else{

            return responseJson(1, 'لا يوجد طلب', $order );

        }
    }



    public function cancelled(Request $request, $id)
    {

        $order = $request->user()->orders()->find($id);
        if($order->status = 'prepared') {


        $order->status = 'cancelled';
        $order->update(['status' => 'cancelled']);

// Create Notify

        $restaurant = $order->restaurants;

        $restaurant->notifications()->create([

            'title' => 'تم الغاء الطلب',
            'title_en' => 'Order Is Cancelled',
            'body' => 'تم الغاء الطبب من العميل '.$request->user()->name,
            'body_en' => 'Order Is Cancelled by'.$request->user()->name,
            'order_id' => $order->id,



        ]);


        $tokens = $restaurant->tokens()->where('token', '!=' ,'')->pluck('token')->toArray();
        if (count($tokens)) {
            $body  = [

            'en' => 'Order Is Cancelled'.$request->user()->name,
            'ar' => 'تم الغاء  الطلب'.$request->user()->name

        ];

        $title = $restaurant->title;
    
        $data =[

            'user_type' => 'restaurant',
            'action' => 'Order Cancelled',
            'order_id' => $order->id,
        ];

        $send = notifyByFirebase($title, $body, $tokens, $data, $is_notification =true);
            
        }


            return responseJson(1, 'تم الغاء الطلب', [
                'order' => $order,
                'notify'=> $send??null
            ] );


        }else {

            return responseJson(1, 'لا يوجد طلب', $order );
            

        }
    }
     


    public function current_orders(Request $request)
    {
            
        $client = $request->user();  
        $current = $client->orders()->where('status' , 'pending')->paginate(5);

        return responseJson(1, 'success', $current );


    }   

  
    public function last_orders(Request $request)
    {
       $client = $request->user();  
       $current = $client->orders()->where('status' , 'delivered')->paginate(5);

        return responseJson(1, 'success', $current );


    }



}
