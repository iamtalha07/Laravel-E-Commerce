<?php

namespace App\Http\Controllers;

use Session;
use App\Setting;
use App\SiteSettings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function viewDetails()
    {
        $data = SiteSettings::all();
        return view('admin.admin_settings.detail',['data'=>$data]);
    }
    
    public function addDetails()
    {
        return view('admin.admin_settings.add-detail');
    }

    public function store(Request $request){
        $details = [
            ['key'=>'address', 'value'=> $request->input('address')],
            ['key'=>'email','value'=>$request->input('email')],
            ['key'=>'phone','value'=>$request->input('phone')],
            ['key'=>'fb','value'=>$request->input('facebook')],
            ['key'=>'twitter','value'=>$request->input('twitter')],
            ['key'=>'insta','value'=>$request->input('insta')],
            ['key'=>'youtube','value'=>'https://www.youtube.com'],
        ];

        SiteSettings::insert($details);
        Session::flash('status','Added successfully');
        return redirect('view-details');
    }
   

    public function storeDetails()
    {
        $data = Setting::first();
        // $settings = SiteSettings::get()->pluck('value','key')->toArray();
        // return $settings['email'];
        return view('admin.admin_settings.store-detail',['data'=>$data]);
    }

    public function update(Request $request,$id)
    {
       // echo $request->input('id');
        $settings = Setting::find($id);
        $settings->address = $request->input('address');
        $settings->email = $request->input('email');
        $settings->phone = $request->input('phone');
        $settings->fb = $request->input('facebook');
        $settings->twitter = $request->input('twitter');
        $settings->insta = $request->input('insta');
        $settings->save();
        Session::flash('status','Data updated successfully');
        return redirect('store-details');


    }
}
