<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
