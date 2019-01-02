<?php

namespace App\Http\Controllers\Api\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Comment;
use App\Product;
use App\Offer;
use App\Client;
use App\Order;

class MainController extends Controller
{      
	
    //All Restaurants		
	public function restaurants(){


		$restaurants = Restaurant::paginate(5);

		return  responseJson(1, 'success', $restaurants);


	}

    // Restaurant Info
	public function restaurant(Request $request){

		$restaurant = Restaurant::find($request->id);


		return responseJson(1, 'success', $restaurant);

	}

	public function comments(Request $request){

		$comments = $request->user()->comments()->with('client')->paginate(5);

		return responseJson(1, 'success', $comments);

	}
	
	public function offers(Request $request){

		$offers = $request->user()->offers()->paginate(5);

		return responseJson(1, 'success', $offers);

	}



	public function products(Request $request){

		$products = $request->user()->products()->paginate(5);

		return responseJson(1, 'success', $products);


	}

    //Create Product

	public function store(Request $request)
	{	
		
		$validator = validator()->make($request->all(),[

			'name' => 'required',
			'price' => 'required',
			'description' => 'required',
			'image' => 'required|image|max:1900',
			'duration' => 'required',

		]);


		if ($validator->fails()) {
			
			return responseJson(0, $validator->errors()->first() , $validator->errors());		
		}

	

        $product= new Product;
		$product->restaurant_id = $request->user()->id;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->duration = $request->input('duration');

    	 if ($request->hasFile('image')) {

            $path = $request->file('image')->store('public/image');
            $file =pathinfo($path , PATHINFO_BASENAME);
			$product->image = $file;
        }
		//$product = $request->user()->products()->create($request->all());
		$product->save();

		return responseJson(1, 'success' , $product);

	}




	public function update(Request $request, $id)
	{	
		
		$validator = validator()->make($request->all(),[

		'name' => 'required',
		'price' => 'required',
		'description' => 'required',
		'image' => 'required|image|max:1900',
		'duration' => 'required',

			//	'email' => 'required|unique:users,email,'.$request->user()->id,
		// to make email unique in update

	]);
 	

    	if ($validator->fails()) {
    		
    		return responseJson(0, $validator->errors()->first() , $validator->errors());		
    	}

    	$product = Product::findOrFail($id);
    	$product->restaurant_id = $request->user()->id;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->duration = $request->input('duration');

        if ($request->hasFile('image')) {

            $path = $request->file('image')->store('public/image');
            $file =pathinfo($path , PATHINFO_BASENAME);
            $product->image = $file;
        }
    	
    	$product->save();

    	return responseJson(1, 'success' , $product);
	}




	public function delete(Request $request)
	{

       Product::where('id',$request->id)->delete();

		return responseJson(1, 'Deleted Successfully' );

	}



	public function create_offer(Request $request)
	{

		$validator = validator()->make($request->all(),[

			'name'=>'required',
			'price'=>'required',
			'duration'=>'required',
			'duration' => 'required',
			'description'=>'required',
			'image'=>'required|image|max:1900',

		]);

		if ($validator->fails()) {
            
            return responseJson(0, $validator->errors()->first() , $validator->errors());       
        }

		 if ($request->hasFile('image')) {

            $path = $request->file('image')->store('public/image');
            $file =pathinfo($path , PATHINFO_BASENAME);
        }

        $offer= new Offer;
		$offer->restaurant_id = $request->user()->id;
        $offer->name = $request->input('name');
        $offer->price = $request->input('price');
        $offer->description = $request->input('description');
        $offer->duration = $request->input('duration');
		$offer->image = $file;

		//$product = $request->user()->products()->create($request->all());
		$offer->save();
        

		return responseJson(1, 'success' , $offer);

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

    public function accepted(Request $request, $id)
    {

        $order = $request->user()->orders()->find($id);
        if($order->status = 'pending') {


        $order->status = 'accepted';
        $order->update(['status' => 'accepted']);

// Create Notify
        $client = $order->clients;

        $client->notifications()->create([

            'title' => 'تم الموافيه علي الطلب',
            'title_en' => 'Order Is Accepted',
            'body' => 'تمت الموافقة علي الطبب من المطعيم '.$request->user()->name,
            'body_en' => 'Order Is Accepted by'.$request->user()->name,
            'order_id' => $order->id,



        ]);


        $tokens = $client->tokens()->where('token', '!=' ,'')->pluck('token')->toArray();
        if (count($tokens)) {

        $body  = [

            'en' => 'Order Is Accepted'.$request->user()->name,
            'ar' => 'تم الموافيه علي الطلب'.$request->user()->name

        ];

        $title = $client->title;
    
        $data =[

            'user_type' => 'client',
            'action' => 'Order Delivered',
            'order_id' => $order->id,
        ];

        $send = notifyByFirebase($title, $body, $tokens, $data, $is_notification =true);

        }
    		
    		return responseJson(1, 'تمت الموافقه عاي الطلب', [
                'order' => $order,
                'notify'=> $send??null
            ] );

    	}

   		return responseJson(1, 'لا يوجد طلب' , $order );
    }




    public function rejected(Request $request, $id)
    {

         $order = $request->user()->orders()->find($id);
        if($order->status = 'pending') {


        $order->status = 'rejected';
        $order->update(['status' => 'rejected']);

// Create Notify

        $client = $order->clients;

        $client->notifications()->create([

            'title' => 'تم رفض علي الطلب',
            'title_en' => 'Order Is rejected',
            'body' => 'تم رفض علي الطبب من المطعيم '.$request->user()->name,
            'body_en' => 'Order Is Rejected by'.$request->user()->name,
            'order_id' => $order->id,



        ]);


        $tokens = $client->tokens()->where('token', '!=' ,'')->pluck('token')->toArray();
        if (count($tokens)) {
            $body  = [

            'en' => 'Order Is Rejected'.$request->user()->name,
            'ar' => 'تم رفض  الطلب'.$request->user()->name

        ];

        $title = $client->title;
    
        $data =[

            'user_type' => 'client',
            'action' => 'Order Rejected',
            'order_id' => $order->id,
        ];

        $send = notifyByFirebase($title, $body, $tokens, $data, $is_notification =true);
            
        }


    		return responseJson(1, 'تم رفض الطلب', [
                'order' => $order,
                'notify'=> $send??null
            ] );

    	}else {
            
    		return responseJson(1, 'لا يوجد طلب' , $order );
        }


    }


    public function delivered(Request $request, $id)
    {

    $order = $request->user()->orders()->find($id);
        if($order->status = 'prepared') {


        $order->status = 'delivered';
        
        $order->update(['status' => 'delivered']);

// Create Notify

        $client = $order->clients;

        $client->notifications()->create([

            'title' => 'تم تسليم الطلب',
            'title_en' => 'Order Is Delivered',
            'body' => 'تم تسليم الطبب من المطعيم '.$request->user()->name,
            'body_en' => 'Order Is Delivered by'.$request->user()->name,
            'order_id' => $order->id,



        ]);


        $tokens = $client->tokens()->where('token', '!=' ,'')->pluck('token')->toArray();
        if (count($tokens)) {
            $body  = [

            'en' => 'Order Is Delivered'.$request->user()->name,
            'ar' => 'تم تسليم  الطلب'.$request->user()->name

        ];

        $title = $client->title;
    
        $data =[

            'user_type' => 'client',
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



    public function change_status(Request $request)
    {
    	$restaurant = $request->user();

    	if ($restaurant->status == 'open') {
    		

    		$restaurant->status = 'close';
    		$restaurant->update(['status' => $restaurant->status]);
    		return responseJson(1, 'المطعم مغلق');
    	}else {
    		
			$restaurant->status = 'open';
    		$restaurant->update(['status' => $restaurant->status]);
    		return responseJson(1, 'المطعم مفتوح');
    	}
    }


    public function commission(Request $request)
    {
    	$cost = $request->user()->orders()->where('status' , 'delivered')->sum('cost');

    	$commission = $request->user()->orders()->where('status' , 'delivered')->sum('commission');

    	$paid = $request->user()->payments()->sum('done');

    	$remain = $commission - $paid;

    	$data = [
    		'cost' => $cost,
    		'commission' => $commission,
    		'paid' => $paid,
    		'remain' => $remain,
    	];

    	return responseJson(1, 'success', $data);
    }





}
