<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Response;
use Hash;
use Auth;

class AuthController extends Controller
{
   

	public function logout(){

		\Auth::guard('web')->logout();

		return redirect('/login');

	}


	public function changePassword()
	{
		return view('admin.changePassword');
	}

	public function changePasswordSave(Request $request)
	{
		$this->validate($request,[

			'old-password' => 'required',
			'password' => 'required|confirmed',

		]);

		$user = Auth::user();

		if (Hash::check($request->input('old-password'), $user->password)) {
			
			$user->password = bcrypt($request->input('password'));
			$user->save();

			return redirect('changePassword')->with('success' , 'Password Changes Successfully');

		}else{

			return redirect('changePassword')->with('failed' , 'Password Doesnt Updated');
		}

	}
}
