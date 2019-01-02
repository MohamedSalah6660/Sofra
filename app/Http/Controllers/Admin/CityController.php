<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\Governorate;
use Validator;
 
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $cities = City::orderBy('id', 'desc')->paginate(5);

        return view('admin.city.index',compact('cities'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        return view('admin.city.create');
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

        $city = City::create($request->all());

        $city->save();

                return redirect('cities')->with('success' , 'Created Successfully');


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
        $cities = City::findOrFail($id);

        
        return view('admin.city.edit', compact('cities'));



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
           $this->Validate($request, [

            'name'=>'required',

        ]);

        $city = City::find($id);
        $city->update($request->all());

        $city->save(); 

        return redirect('cities')->with('success', 'Updated Successfully');

   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
         */
    public function destroy($id)
    {

        $city = City::findOrFail($id)->delete();
        
        return back()->with('delete' , 'Deleted successfully');

    }



 
 }