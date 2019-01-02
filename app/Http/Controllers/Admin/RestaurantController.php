<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restaurant;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $restaurants = Restaurant::paginate(5);


        return view('admin.restaurant.index' , compact('restaurants'));

    }

    public function destroy($id)
    {
        $restaurants = Restaurant::find($id)->delete();

        return back()->with('delete' , 'Deleted Successfully');

    }
}
