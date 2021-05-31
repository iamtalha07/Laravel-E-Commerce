<?php

namespace App\Http\Controllers;

use Session;
use App\Image;
use App\Banner;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index()
    {
        $data = Banner::all();
         return view('admin.admin_banners.banner',['data'=>$data]);
    }

    public function addBanner()
    {
        $data = Category::all();
        return view('admin.admin_banners.add-banner',['data'=>$data]);
    }

    public function store(Request $request)
    {
        $banner = new Banner;
        $photo = new Image;

        $banner->name =  $request->input('name');
        $banner->content =  $request->input('content');
        $banner->save();

        if($request->hasFile('banner_image'))
        {
            $file = $request->file('banner_image');
            $extension = $file->getClientOriginalExtension();
            $filename = mt_rand(100000, 999999).'.'.$extension;
            $file->move('uploads/banner_image/',$filename);
            $photo->image = $filename;
            $banner->images()->save($photo);
        }
        Session::flash('status','Banner added successfully');
        return redirect('banner');
    }

    public function edit($id)
    {
        $data = Banner::find($id);
        return view('admin.admin_banners.edit-banner',['data'=>$data]);
    }

    public function update(Request $request)
    {
        $banner = Banner::find($request->input("id"));
        $photo = new Image;
        $imagename = Image::where('imageable_type','App\Banner')->where('imageable_id', $request->input("id"))->get();
       
        foreach($imagename as $data)
        {
         $path =  $data->image;
        }
         $image_path = "uploads/banner_image/".$path;

         if(File::exists($image_path)) {

            $imagename = Image::where('imageable_type','App\Banner')->where('imageable_id', $request->input("id"))->delete();
            unlink($image_path); 
             }

             if($request->hasFile('banner_image'))
             {
                 $file = $request->file('banner_image');
                 $extension = $file->getClientOriginalExtension();
                 $filename = mt_rand(100000, 999999).'.'.$extension;
                 $file->move('uploads/banner_image/',$filename);
                 $photo->image = $filename;
                 $banner->images()->save($photo);
             }


        $banner->name = $request->input('name');
        $banner->content = $request->input('content');
        $banner->save();

        Session::flash('status','Banner Updated successfully');
        return redirect('banner');
    }

    public function destroy($id)
    {
        $photo = new Image;

        $imagename = Image::where('imageable_type','App\Banner')->where('imageable_id', $id)->get();

        foreach($imagename as $data)
        {
         $path =  $data->image;
        }
         $image_path = "uploads/banner_image/".$path;

         if(File::exists($image_path)) 
         {

            $imagename = Image::where('imageable_type','App\Banner')->where('imageable_id', $id)->delete();
            
            unlink($image_path);
                
         }

         Banner::find($id)->delete();
         Session::flash('status','Banner deleted successfully');
         return redirect('banner');
    }
}
