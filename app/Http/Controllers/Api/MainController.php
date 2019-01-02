<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\Category;
use App\Contact;
use App\Client;
use App\Order;
use App\Product;
use App\Setting;
use App\Restaurant;
use App\PaymentMethod;
use App\Notification;

class MainController extends Controller
{


	public function cities(){


		$cities = City::paginate(5);

		return responseJson(1, 'success', $cities);


	}

	public function categories(){


		$categories = Category::paginate(5);

		return responseJson(1, 'success', $categories);


	}

    public function settings()


    {
       $settings = Setting::paginate(5);

        return responseJson(1,'success',$settings);
    }



	public function contacts(Request $request)

	{

		$validator = validator()->make($request->all(), [

			'name' => 'required',
			'email' => 'required|unique:clients',
			'phone' => 'required|digits:11',
			'message' => 'required',
			'type' => 'required|in:suggestion,complaint,inquiry',

	]);


		if ($validator->fails()) {
			
			return responseJson(0 , $validator->errors()->first() , $validator->errors());

		}

		$contacts = Contact::create($request->all());
		$contacts->save();
		return responseJson(1, 'success', $contacts);

	}

	public function restaurant_search(Request $request)
	{


		$restaurants = Restaurant::where(function($q) use($request)
			{

			if ($request->has('city_id')) {
				$q->where('city_id' , $request->city_id);
				
			}

			if ($request->has('name')) {
				
			$q->where('name', 'LIKE', "%".$request->name."%");
			
			}



			})->paginate(5);

		return responseJson(1, 'success', $restaurants);


	}


	public function products(Request $request){

		$products = Product::where('restaurant_id' , $request->restaurant_id)->paginate(5);

		return responseJson(1, 'success', $products);

	}



	public function payment_methods()
	{

		$payment_methods = PaymentMethod::paginate(5);

		return responseJson(1, 'success' , $payment_methods);
	}

	public function all_notifications()
	{

		$notifications = Notification::paginate(5);

		return responseJson(1, 'success' , $notifications);
	}

	

    public function test_notification(Request $request)
    {
//        $audience = ['included_segments' => array('All')];
//        if ($request->has('ids'))
//        {
//            $audience = ['include_player_ids' => (array)$request->ids];
//        }
//        $contents = ['en' => $request->title];
//        Log::info('test notification');
//        Log::info(json_encode($audience));
//        $send = notifyByOneSignal($audience , $contents , $request->data);
//        Log::info($send);

        /*
        firebase
        */
        $tokens = $request->ids;
        $title = $request->title;
        $body = $request->body;
        $data = Order::first();
        $send = notifyByFirebase($title, $body, $tokens, $data, true);
        info("firebase result: " . $send);

        return response()->json([
            'status' => 1,
            'msg' => 'تم الارسال بنجاح',
            'send' => json_decode($send)
        ]);
    }
}
