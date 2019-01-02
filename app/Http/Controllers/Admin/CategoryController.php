<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                   
        $categories = Category::paginate(5);

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
        //
    }


    public function store(Request $request)
    {
        $this->validate($request,[

            'name'=>'required'



        ]);

        $category = Category::create($request->all());
        $category->save();

        return redirect('categories')->with('success', 'Created Successfully');
    }


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
       $categories = Category::find($id);

        return view('admin.category.edit', compact('categories'));
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
         $this->validate($request,[

            'name'=>'required'

        ]);

        $category = Category::find($id);
       $category->name = $request->input('name');

        $category->save();
        return redirect('categories')->with('success', 'Updated successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id)->delete();

        return back()->with('delete' , 'Deleted successfully');

           
    }

}
