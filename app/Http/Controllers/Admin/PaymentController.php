<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payment;
use App\Restaurant;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::paginate(5);

        return view('admin.payment.index' , compact('payments'));    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::pluck('name', 'id')->toArray();    

        return view('admin.payment.create', compact('restaurants'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         $this->validate($request, [

           'done' => 'required',
           'restaurant_id' => 'required'

        ]);

        $payment = Payment::create($request->all());

        $payment->save();

        return redirect('payments')->with('success' , 'Created Successfully');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payments = Payment::findOrFail($id);

        $restaurants = Restaurant::pluck('name', 'id')->toArray();

        return view('admin.payment.edit' , compact('payments' , 'restaurants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     $this->validate($request, [

           'done' => 'required',
           'restaurant_id' => 'required'

        ]);

        $payment = Payment::find($id);

        $payment->update($request->all());

        $payment->save();

        return redirect('payments')->with('success' , 'updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::find($id)->delete();

        return back()->with('delete' , 'Deleted Successfully');
    }
}
