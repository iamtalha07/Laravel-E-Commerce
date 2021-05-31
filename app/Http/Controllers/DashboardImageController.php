<?php

namespace App\Http\Controllers;

use App\DashboardImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Session;
use App\Image;

class DashboardImageController extends Controller
{
    public function addImage()
    {
       return view('admin.admin_customer_dashboard.add-images'); 
    }
    public function add($request,$name,$type)
    {
        $file = $request->file($name);
        $extension = $file->getClientOriginalExtension();
        $filename = mt_rand(100000, 999999).'.'.$extension;
        $file->move('uploads/'.$name,$filename);
        $photo = new Image;
        $photo->image = $filename;
        $photo->type = $type;
        return $photo;
    }

    public function store(Request $request)
    {
        $dashboard = new DashboardImages;
        $dashboard->save();

        if($request->hasFile('banner_top'))
        {
            // $photo = $this->add($request,'banner_top','bannerTop');
            $file = $request->file('banner_top');
            $extension = $file->getClientOriginalExtension();
            $filename = mt_rand(100000, 999999).'.'.$extension;
            $file->move('uploads/banner_top',$filename);
            $photo = new Image;
            $photo->image = $filename;
            $photo->type = "bannerTop";
            $dashboard->images()->save($photo);
        }
        if($request->hasFile('banner_bottom'))
        {
            $photo2 = $this->add($request,'banner_bottom','bannerBottom');
            // $file1 = $request->file('banner_bottom');
            // $extension1 = $file1->getClientOriginalExtension();
            // $filename1 = mt_rand(100000, 999999).'.'.$extension1;
            // $file1->move('uploads/banner_bottom',$filename1);
            // $photo = new Image;
            // $photo->image = $filename1;
            // $photo->type = "bannerBottom";
            $dashboard->images()->save($photo2);
        }
        if( $request->hasFile('dashboard_image1'))
        {
            $photo3 = $this->add($request,'dashboard_image1','dashboardImage1');
            $dashboard->images()->save($photo3);
        }
        if( $request->hasFile('dashboard_image2'))
        {
            $photo4 = $this->add($request,'dashboard_image2','dashboardImage2');
            $dashboard->images()->save($photo4);
        }
        if( $request->hasFile('dashboard_image3'))
        {
            $photo5 = $this->add($request,'dashboard_image3','dashboardImage3');
            $dashboard->images()->save($photo5);
        }
        if( $request->hasFile('dashboard_image4'))
        {
            $photo6 = $this->add($request,'dashboard_image4','dashboardImage4');
            $dashboard->images()->save($photo6);
        }
        if( $request->hasFile('dashboard_image5'))
        {
            $photo7 = $this->add($request,'dashboard_image5','dashboardImage5');
            $dashboard->images()->save($photo7);
        }
        if( $request->hasFile('dashboard_image6'))
        {
            $photo8 = $this->add($request,'dashboard_image6','dashboardImage6');
            $dashboard->images()->save($photo8);
        }
       

        

        Session::flash('status','Images added successfully');
        return redirect('add_dashboard_images');
    }
}
