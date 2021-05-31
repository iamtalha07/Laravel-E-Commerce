<?php

namespace App\Http\Controllers;

use Session;
use App\Brand;
use App\Image;
use App\Product;
use App\Category;
use App\ProductsAttributes;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(ProductRequest $request)
    {
     
        $validated = $request->validated();
        $product = new Product;    
        
        $feature = $request->input('feature');

       if($feature == null)
       {
            $feature = 0;
       }
       else {
        $feature = 1;
       }

        $product->category_id = $request->input('category');
        $product->brand_id = $request->input('brand');
        $product->title = $request->input('title');
        $product->description = $request->get('description');
        $product->specification = $request->get('specification');
        $product->price = $request->input('price');
        $product->is_featured = $feature;
        $product->save();

        $photo = new Image(); 
        if($request->hasFile('product_image'))
        {
            $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();
            $filename = mt_rand(100000, 999999).'.'.$extension;
            $file->move('uploads/product_image/',$filename);
            $photo->image = $filename;
            $photo->type = "master";
            $photo->imageable_id = $product->id;
            $photo->imageable_type = "App\Category";
            $product->images()->save($photo);

        }
        Session::flash('status','Product added successfully');
        return redirect('products'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
       // $data = Product::all();
       $value = "master";
       $data = Product::with(['images' => function($query) use($value){

           $query->where('type',$value);
       }
       ])->get();
       $category = Category::all();
        return view('admin.admin_products.products',["data"=>$data]);

    }

    public function addProduct()
    {
        $data = Category::all();
        $brand = Brand::all();
        return view('admin.admin_products.product_add',[
            
            'data'=>$data,
            'brand'=>$brand,


        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::all();
        $brand = Brand::all();
        $data = Product::find($id);

        return view('admin.admin_products.product_edit',[
            'data'=>$data,
            'category'=>$category,
            'brand'=>$brand 
        ]);
        // return view('admin.admin_products.product_edit',['data'=>$data],['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $req)
    {
     $filename = $req->my_image;
     $product = Product::find($req->input("id"));
     $photo = new Image;
     $imagename = Image::where('type', 'master')->where('imageable_type','App\Product')->where('imageable_id', $req->input("id"))->get();

     $image = $req->file('product_image');
     if($image != "") 
     {
         foreach($imagename as $data)
                {
                $path =  $data->image;
                }
            $image_path = "uploads/product_image/".$path;

                if(File::exists($image_path)) {
                    $imagename = Image::where('type', 'master')->where('imageable_type','App\Product')->where('imageable_id', $req->input("id"))->delete();
                    unlink($image_path);
                     }

                    $file = $req->file('product_image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = mt_rand(100000, 999999).'.'.$extension;
                    $file->move('uploads/product_image/',$filename);
                    $photo->image = $filename;
                    $photo->type = "master";
                    $product->images()->save($photo);
     }

     else{
        foreach($imagename as $data)
        {
        $path =  $data->image;
        }
         $image_path = "uploads/product_image/".$path;

        if(File::exists($image_path)) {
            $imagename = Image::where('type', 'master')->where('imageable_type','App\Product')->where('imageable_id', $req->input("id"))->delete();
           
             }

        $photo->image = $filename;
        $photo->type = "master";
        $product->images()->save($photo);
     }

    //     $product = Product::find($req->input("id"));
    //     $photo = new Image;

    //     $imagename = Image::where('type', 'master')->where('imageable_type','App\Product')->where('imageable_id', $req->input("id"))->get();
    //     foreach($imagename as $data)
    //     {
    //      $path =  $data->image;
    //     }
    //      $image_path = "uploads/product_image/".$path;

    //      if(File::exists($image_path)) {

    //         $imagename = Image::where('type', 'master')->where('imageable_type','App\Product')->where('imageable_id', $req->input("id"))->delete();
            
    //         unlink($image_path);
                
    //          }

    //     if($req->hasFile('product_image'))
    //     {
    //         $file = $req->file('product_image');
    //         $extension = $file->getClientOriginalExtension();
    //         $filename = mt_rand(100000, 999999).'.'.$extension;
    //         $file->move('uploads/product_image/',$filename);
    //         $photo->image = $filename;
    //         $photo->type = "master";
    //         $product->images()->save($photo);

    //     }

        $feature = $req->input('feature');
       if($feature == null)
       {
            $feature = 0;
       }
       else {
        $feature = 1;
       }
        $product->title = $req->input('title');
        $product->description = $req->input('description');
        $product->specification = $req->get('specification');
        $product->price = $req->input('price');
        $product->category_id = $req->input("category");
        $product->brand_id = $req->input('brand');
        $product->is_featured = $feature;

        $product->save();
        Session::flash('status','Product updated successfully');
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       
        $photo = new Image;

        $imagename = Image::where('type', 'master')->where('imageable_type','App\Product')->where('imageable_id', $id)->get();
        foreach($imagename as $data)
        {
         $path =  $data->image;
        }
         $image_path = "uploads/product_image/".$path;

         if(File::exists($image_path)) {

            $imagename = Image::where('type', 'master')->where('imageable_type','App\Product')->where('imageable_id', $id)->delete();
            
            unlink($image_path);
                
             }

        Product::find($id)->delete();
        Session::flash('status','Product deleted successfully');
        return redirect('products');
    }   

    public function addImages($id)
    {
        $data = Product::find($id);
        $product_category = Product::find($id)->category;
        
        return view('admin.admin_products.product_add_images',['data'=>$data],['product_category'=>$product_category]);
        // echo $product_category->title;
    }

    public function addMultiImages(Request $request)
    {
        
        $product = Product::find($request->id);
        if($request->hasFile('file'))
        {
            foreach($request->file as $file)
            {   
                //  $extension = $file->getClientOriginalExtension();
                // $filename = mt_rand(100000, 999999).'.'.$extension;
                // $file->move('uploads/product_image_multiple/'.$filename);
                $destinationPath = "uploads/product_image_multiple/";
                $extension = $file->getClientOriginalExtension();
                $filename = mt_rand(100000, 999999).'.'.$extension;
                $file->move($destinationPath,$filename);
                $fileModel = new Image;
                $fileModel->image = $filename;
                $fileModel->type = "Child";
                $images[] = $fileModel;
            }
            $product->images()->saveMany($images);

            Session::flash('status','Image Added successfully');
            return redirect('products');

        }
    }

    public function addAtrributes(Request $request, $id)
    {
        $data = Product::find($id);
        $product_category = Product::find($id)->category;
        return view('admin.admin_products.add_attributes',[
            
            'data'=>$data,
            'product_category'=>$product_category,
        
        ]);
    }

    public function storeAttributes(Request $request,$id)
    {
        $data = $request->all();
        foreach($data['sku'] as $key =>$val)
        {
            if(!empty($val))
            {
                //Prevent duplicate SKU Record
                $attrCountSKU = ProductsAttributes::where('sku',$val)->count();
                if($attrCountSKU > 0)
                {
                    Session::flash('status','SKU already exist');
                    return redirect('add-attributes/'.$id);
                }
                //Prevent duplicate Size Record
                $attrCountSize = ProductsAttributes::where(['product_id'=>$id, 'size'=>$data['size'][$key]])->count();
                if($attrCountSize > 0)
                {
                    Session::flash('status','Dublicate Size Not Allowed');
                    return redirect('add-attributes/'.$id);
                }
                $attribute = new ProductsAttributes;
                $attribute->product_id = $id;
                $attribute->sku = $val;
                $attribute->size = $data['size'][$key];
                $attribute->color = $data['color'][$key];
                $attribute->stock = $data['stock'][$key];
                $attribute->save();
            }
          
        }
        Session::flash('status','Attributes Added successfully');
        return redirect('products');
    }


    
}
    

   

    
