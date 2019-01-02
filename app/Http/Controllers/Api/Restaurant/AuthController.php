<?php

namespace App\Http\Controllers\Api\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restaurant;
use Hash;
use Mail;
use App\Token;

class AuthController extends Controller
{
    

	public function register(Request $request)
	{
		$validator = validator()->make($request->all(),[

			'name' => 'required',
			'email' => 'required|unique:restaurants',
			'password' => 'required|confirmed',
			'phone' => 'required|unique:restaurants|digits:11',
			'quarter' => 'required',
			'receiving_time' => 'required|numeric',
			'delivery_time' => 'required|numeric',
			'delivery_fee' => 'required|numeric',
			'whatsapp' => 'required',
			'minimum' => 'required|numeric',
			'rate' => 'required|numeric',
			'city_id' => 'required',

		]);
		if ($validator->fails()) {
		
			return responseJson(0 , $validator->errors()->first() , $validator->errors());
		}


		$request->merge(['password'=> bcrypt($request->password)]);
		$restaurant = Restaurant::create($request->all());
		$restaurant->api_token = str_random(60);
		$restaurant->save();

		return responseJson(1, 'تم الاضافه بنجاح' , [

			'api_token' =>$restaurant->api_token, 
			'restaurant' => $restaurant,

		]);	
	}






//Login For Reasaurant


	public function login(Request $request){

		$validator = validator()->make($request->all(),[

			'email' => 'required',
			'password' => 'required',
		
		]);
		if ($validator->fails()) {
		
			return responseJson(0 , $validator->errors()->first() , $validator->errors());
		}

  $restaurant = Restaurant::where('email', $request->email)->first();

  if ($restaurant) {

			return responseJson(1 , 'تم تسجيلالدخول' , [
				
			'api_token' =>$restaurant->api_token, 

				'restaurant' => $restaurant

			]);
			
	
	
  }else {
			return responseJson(0 , 'البيانات غير صحيحة' );
	
  }

	}




//Reset For Restaurant


  public function reset(Request $request)
  {


    $validation = validator()->make($request->all(),[

  	  'email' => 'required'


     ]);
       if ($validation->fails()) 
       {
         $data = $validation->errors();
          return responseJson(0,$validation->errors()->first(),$data);
        }

    $user = Restaurant::where('email' , $request->email)->first();

    if ($user) {
  		  $code = rand(1111, 9999);
      	$update = $user->update(['pin_code' =>$code]);

      if ($update) {

       Mail::send('emails.reset', ['code' => $code], function ($mail) use($user) {

           $mail->to($user->email, $user->name)->subject('إعادة تعيين كلمة المرور');


         });
            return responseJson(0,'تم الارسال');
  	
      }else {
  	
                  return responseJson(0,'حدث خطأ ، حاول مرة أخرى');



      }

    }else {
      return responseJson(0,'لا يوجد أي حساب مرتبط بهذا الهاتف');
  		
    }


  }




  public function password(Request $request)
  {

	    $validation = validator()->make($request->all(), [
        'pin_code' => 'required',
        'password' => 'confirmed'
      ]);

        if ($validation->fails()) {
            $data = $validation->errors();
            return responseJson(0,$validation->errors()->first(),$data);
        }

           $user = Restaurant::where('pin_code',$request->pin_code)->where('pin_code','!=',0)->first();

           if ($user)
           {
              $user->password = bcrypt($request->password);
              $user->pin_code = null;

              if ($user->save())
               {

                return responseJson(1,'تم تغيير كلمة المرور بنجاح');

               }else{

                return responseJson(0,'حدث خطأ ، حاول مرة أخرى');
             
               }

          }else{

            return responseJson(0,'هذا الكود غير صالح');
           
           }
  }




//Profile For Resaurant

	public function profile(Request $request)
 {
         
    $restaurant = \Auth::guard('api-rest')->user();

    if ($request->has('name')) {
      $restaurant->name= $request->input('name');
    }

    if ($request->has('email')) {
       $restaurant->email= $request->input('email');
    }

     if ($request->has('phone')) {
        $restaurant->phone= $request->input('phone');
    }

   if ($request->has('password')) 
   {

      $validator = validator()->make($request->all(), [
      
      'password' => 'required|confirmed',
      ]);
      
      if ($validator->fails()) {

        return responseJson(0,$validator->errors()->first(),$validator->errors());  
      
       }

     $restaurant->password= $request->input('password');
    }


    if ($request->has('quarter')) { 
       $restaurant->quarter= $request->input('quarter');
    }

   if ($request->has('receiving_time')) {

    $validator = validator()->make($request->all(), [
      
      'receiving_time' => 'required|numeric',
      ]);
      
      if ($validator->fails()) {

        return responseJson(0,$validator->errors()->first(),$validator->errors());  
      
       }

     $restaurant->receiving_time= $request->input('receiving_time');
    } 

   if ($request->has('delivery_time')) {

        $validator = validator()->make($request->all(), [
      
      'delivery_time' => 'required|numeric',
      ]);
      
      if ($validator->fails()) {

        return responseJson(0,$validator->errors()->first(),$validator->errors());  
      
       }

       $restaurant->delivery_time= $request->input('delivery_time');
      } 

   if ($request->has('delivery_fee')) {

    $validator = validator()->make($request->all(), [
      
      'delivery_fee' => 'required|numeric',
      ]);
      
      if ($validator->fails()) {

        return responseJson(0,$validator->errors()->first(),$validator->errors());  
      
       }

       $restaurant->delivery_fee= $request->input('delivery_fee');
      } 

   if ($request->has('whatsapp')) {

        $validator = validator()->make($request->all(), [
      
      'whatsapp' => 'required|numeric',
      ]);
      
      if ($validator->fails()) {

        return responseJson(0,$validator->errors()->first(),$validator->errors());  
      
       }

       $restaurant->whatsapp= $request->input('whatsapp');
      } 

     
    if ($request->has('minimum')) {

    $validator = validator()->make($request->all(), [
      
      'minimum' => 'required|numeric',
      ]);
      
      if ($validator->fails()) {

        return responseJson(0,$validator->errors()->first(),$validator->errors());  
      
       }

       $restaurant->minimum= $request->input('minimum');
      } 

    if ($request->has('rate')) {


      $validator = validator()->make($request->all(), [
      
      'rate' => 'required|numeric',
      ]);
      
      if ($validator->fails()) {

        return responseJson(0,$validator->errors()->first(),$validator->errors());  
      
       }


       $restaurant->rate= $request->input('rate');
      } 

    if ($request->has('city_id')) {
       $restaurant->city_id= $request->input('city_id');
      } 

    $restaurant->save();

    return responseJson(1,'success',[
     
     'api_token' => $restaurant->api_token ,
     'restaurant' => $restaurant

    ]);        

  }


    public function registerToken(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'token' => 'required',
            'platform' => 'required|in:android,ios'

        ]);

        if ($validation->fails()) {

            $data = $validation->errors();

            return responseJson(0,$validation->errors()->first(),$data);
        }

        Token::where('token',$request->token)->delete();

        $request->user()->tokens()->create($request->all());

        return responseJson(1,'تم التسجيل بنجاح');
    }



    public function removeToken(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'token' => 'required',
        ]);

        if ($validation->fails()) {
            $data = $validation->errors();
            return responseJson(0,$validation->errors()->first(),$data);
        }

        Token::where('token',$request->token)->delete();

        return responseJson(1,'تم  الحذف بنجاح بنجاح');
    }



}
