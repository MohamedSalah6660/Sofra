<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Offer;
class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::paginate(5);

        return view('admin.offer.index' , compact('offers'));
    }

  
    public function destroy($id)
    {

        $offer = Offer::find($id)->delete();

        return back()->with('delete' , 'Deleted Successfully');

    }
}
