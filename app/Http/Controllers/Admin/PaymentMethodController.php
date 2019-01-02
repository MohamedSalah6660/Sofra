<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PaymentMethod;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_methods = PaymentMethod::paginate(5);

        return view('admin.payment_method.index' , compact('payment_methods'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payment_method.create');
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

           'name' => 'required',

        ]);

        $payment_method = PaymentMethod::create($request->all());

        $payment_method->save();

        return redirect('payment_methods')->with('success' , 'Created Successfully');


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
        $payment_methods = PaymentMethod::findOrFail($id);


        return view('admin.payment_method.edit' , compact('payment_methods'));
  
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

           'name' => 'required',

        ]);

         $payment_method = PaymentMethod::find($id);

         $payment_method->update($request->all());

        $payment_method->save();

        return redirect('payment_methods')->with('success' , 'updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment_method = PaymentMethod::find($id)->delete();
        
        return back()->with('delete' , 'Deleted Successfully');


    }
}
