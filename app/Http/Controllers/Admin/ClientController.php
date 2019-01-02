<?php
 
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use App\City;
use App\BloodType;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id', 'desc')->paginate(10);

        return view('admin.client.index', compact('clients'));

    }

   
    public function destroy($id)
    {
        $clients = Client::findOrFail($id)->delete();

        return back()->with('delete' , 'Deleted Successfully');  
    }

}
