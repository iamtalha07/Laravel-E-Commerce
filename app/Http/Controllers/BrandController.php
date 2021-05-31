<?php

namespace App\Http\Controllers;

use Session;
use App\Brand;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function index()
    {
        $data = Brand::all();
         return view('admin.admin_brands.brands',['data'=>$data]);
    }

    public function addBrand()
    {
        return view('admin.admin_brands.add-brand');
    }

    public function store(Request $request)
    {
        $brand = new Brand;
        $photo = new Image;

        $brand->name =  $request->input('name');
        $brand->save();

        if($request->hasFile('brand_image'))
        {
            $file = $request->file('brand_image');
            $extension = $file->getClientOriginalExtension();
            $filename = mt_rand(100000, 999999).'.'.$extension;
            $file->move('uploads/brand_image/',$filename);
            $photo->image = $filename;
            $brand->images()->save($photo);
        }

        Session::flash('status','Brand added successfully');
        return redirect('brand');

    }

    public function destroy($id)
    {
        $photo = new Image;

        $imagename = Image::where('imageable_type','App\Brand')->where('imageable_id', $id)->get();

        foreach($imagename as $data)
        {
         $path =  $data->image;
        }
         $image_path = "uploads/brand_image/".$path;

         if(File::exists($image_path)) 
         {
            $imagename = Image::where('imageable_type','App\Brand')->where('imageable_id', $id)->delete();
            unlink($image_path);    
         }

         Brand::find($id)->delete();
         Session::flash('status','Brand deleted successfully');
         return redirect('brand');
    }

    public function edit($id)
    {
        $data = Brand::find($id);
        return view('admin.admin_brands.edit-brand',['data'=>$data]);
    }

    public function update(Request $request)
    {
        $brand = Brand::find($request->input("id"));
        $photo = new Image;
        $imagename = Image::where('imageable_type','App\Brand')->where('imageable_id', $request->input("id"))->get();
       
        foreach($imagename as $data)
        {
         $path =  $data->image;
        }
        $image_path = "uploads/brand_image/".$path;

         if(File::exists($image_path))
             {
            $imagename = Image::where('imageable_type','App\Brand')->where('imageable_id', $request->input("id"))->delete();
            unlink($image_path); 
             }

             if($request->hasFile('brand_image'))
             {
                 $file = $request->file('brand_image');
                 $extension = $file->getClientOriginalExtension();
                 $filename = mt_rand(100000, 999999).'.'.$extension;
                 $file->move('uploads/brand_image/',$filename);
                 $photo->image = $filename;
                 $brand->images()->save($photo);
             }


        $brand->name = $request->input('name');
        $brand->save();

        Session::flash('status','Brand Updated successfully');
        return redirect('brand');
    }
}
