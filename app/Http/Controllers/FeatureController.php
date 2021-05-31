<?php

namespace App\Http\Controllers;

use App\Feature;
use Illuminate\Http\Request;
use Session;

class FeatureController extends Controller
{
    public function index()
    {
        $data = Feature::all();
       return view('admin.admin_feature.feature',['data'=>$data]);
   
    }

    public function addFeature()
    {
        return view('admin.admin_feature.add-feature');
    }

    public function store(Request $request)
    {
        $feature = new Feature;
        $count = Feature::where('is_active',1)->count();
        $data = $request->input('active');
        if($data == null)
        {
             $data = 0;
        }
        else {
         $data = 1;
        }

        if($count < 4)
        {
            $feature->title = $request->input('title');
            $feature->content = $request->input('content');
            $feature->icon = $request->input('icon');
            $feature->is_active = $data;
            $feature->save();
        }
        else{

            Session::flash('status','Only 4 Feature is allowed');
            return redirect('feature');
            
        }

        Session::flash('status','Feature added successfully successfully');
        return redirect('feature');

    }

    public function edit($id)
    {
        $data = Feature::find($id);
        return view('admin.admin_feature.edit-feature',['data'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $feature = Feature::find($id);
        $data = $request->input('active');
        if($data == null)
        {
             $data = 0;
        }
        else {
         $data = 1;
        }
        $feature->title = $request->input('title');
        $feature->content = $request->input('content');
        $feature->icon = $request->input('icon');
        $feature->is_active = $data;
        $feature->save();
        Session::flash('status','Feature Updated Successfully');
        return redirect('feature');
    }

    public function destroy($id)
    {
        Feature::find($id)->delete();
        Session::flash('status','Feature deleted successfully');
        return redirect('feature');
    }
}
