<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::paginate(5);

        return view('admin.contact.index' , compact('contacts'));
    }

 
    public function destroy($id)
    {
        $contacts = Contact::find($id)->delete();

        return back()->with('delete' , 'Deleted Successfully');


    }
}
