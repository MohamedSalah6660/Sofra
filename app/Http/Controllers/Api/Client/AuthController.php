<?php

namespace App\Http\Controllers\Api\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use Mail;
use App\Client;
use App\Token;

class AuthController extends Controller
{
 

// Register For Client

	public function register(Request $request)
	{
		$validator = validator()->make($request->all(),[

			'name' => 'required',
			'email' => 'required|unique:clients',
			'password' => 'required|confirmed',
			'phone' => 'required|unique:clients|digits:11',
			'home_description' => 'required',
			'quarter' => 'required',
			'city_id' => 'required',

		]);
		if ($validator->fails()) {
		
			return responseJson(0 , $validator->errors()->first() , $validator->errors());
		}

		$request->merge(['password'=> bcrypt($request->password)]);
		$client = Client::create($request->all());
		$client->api_token = str_random(60);
		$client->save();

		return responseJson(1, 'تم الاضافه بنجاح' , [

			'api_token' =>$client->api_token, 
			'client' => $client,

		]);	
	}




//Login For Client

  public function login(Request $request){

		$validator = validator()->make($request->all(),[

			'email' => 'required',
			'password' => 'required',
		
		]);
		if ($validator->fails()) {
		
			return responseJson(0 , $validator->errors()->first() , $validator->errors());
		}

    $client = Client::where('email', $request->email)->first();

    if ($client) {

			return responseJson(1 , 'تم تسجيلالدخول' , [
				
			'api_token' =>$client->api_token, 

				'client' => $client

			]);
			
	
	
    }else {
			return responseJson(0 , 'البيانات غير صحيحة' );
	
    }

	}

//Reset For Client

  public function reset(Request $request){


    $validation = validator()->make($request->all(),[

	   'email' => 'required'


    ]);

    if ($validation->fails())
    {
       $data = $validation->errors();
       return responseJson(0,$validation->errors()->first(),$data);
    }

    $user = Client::where('email' , $request->email)->first();

    if ($user) {
		    $code = rand(1111, 9999);
    	 $update = $user->update(['pin_code' =>$code]);

      if ($update)
      {

        Mail::send('emails.reset', ['code' => $code], function ($mail) use($user)
         {

           $mail->to($user->email, $user->name)->subject('إعادة تعيين كلمة المرور');


          });
             return responseJson(0,'تم الارسال');
	
      }else 
      {
	
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

          $user = Client::where('pin_code',$request->pin_code)->where('pin_code','!=',0)->first();

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



//Profile For Client


	public function profile(Request $request)
   {
         
          $client = \Auth::guard('api')->user();

          if ($request->has('name')) {
           $client->name= $request->input('name');
          }

          if ($request->has('email')) {
           $client->email= $request->input('email');
          }

           if ($request->has('phone')) {
           $client->phone= $request->input('phone');
          }

          if ($request->has('password')) {

            $validator = validator()->make($request->all(), [
            
            'password' => 'required|confirmed',
            ]);
            
            if ($validator->fails()) {

              return responseJson(0,$validator->errors()->first(),$validator->errors());  
            
             }

           $client->password= $request->input('password');
          }

          if ($request->has('home_description')) { 
           $client->home_description= $request->input('home_description');
          }
     
         if ($request->has('quarter')) {
           $client->city_id= $request->input('quarter');
          } 

          if ($request->has('city_id')) {
           $client->city_id= $request->input('city_id');
          } 
          $client->save();


           return responseJson(1,'success',[
           
           'api_token' => $client->api_token ,
           'client' => $client

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

    /**
     * @param Request $request
     * @return mixed
     */
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
