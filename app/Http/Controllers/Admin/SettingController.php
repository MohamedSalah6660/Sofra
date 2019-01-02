<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;

class SettingController extends Controller
{
   
    public function edit($id)
    {
        $settings = Setting::findOrNew($id);

        return view('admin.setting.edit', compact('settings'));

    }


    public function update(Request $request, $id)
    {
        
         $this->validate($request, [

           'phone' => 'required',
           'email' => 'required',
           'about_app' => 'required',
           'whatsapp' => 'required',
           'facebook_url' => 'required',
           'twitter_url' => 'required',
           'instgram' => 'required',
           'google_url' => 'required',
           'commission' => 'required',

        ]);

         $settings = Setting::find($id);

         $settings->update($request->all());

        $settings->save();

        return redirect('settings/1/edit')->with('success' , 'updated Successfully');


    }

   
}
