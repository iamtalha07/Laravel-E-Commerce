<?php

namespace App\Http\Controllers;
use Session;
use App\Brand;
use App\Banner;
use App\Feature;
use App\Product;
use App\Setting;
use App\Category;
use App\SiteSettings;
use App\DashboardImages;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class UserDashboardController extends Controller
{
    //
    public function index()
    {
        if(Session::has('user'))
        {
        return view('user.dashboard');
        }
        else
        {
            return redirect('user_login');
        }
    }

    public function ShowDashboard()
    {
        $data = Category::all();
        $pic = Banner::all();
        $brand  = Brand::all();
        $feature = Product::where('is_featured',1)->get();
        $recentProduct = Product::orderBy('id','desc')->take(5)->get();
        $image = DashboardImages::all();
        $feature_content = Feature::where('is_active',1)->get();
        

        return view('user.user_dashboard',[
                'data'=>$data,
                'pic'=> $pic,
                'brand'=>$brand,
                'featured'=>$feature,
                'recent'=>$recentProduct,
                'image' => $image,
                'content' => $feature_content,
        ]);
    }
    

    public function ShowProductList()
    {
 
        $value = "master";
        $data = Product::with(['images' => function($query) use($value){

            $query->where('type',$value);
        }
        ])->get();

        $category = Category::all();
        $brand  = Brand::all();
        $brandCount  = Brand::all()->count();

        return view('user.product_list',[
            'data'=>$data,
            'category'=>$category,
            'brand'=>$brand,
            
            ]);
    }

    public function ShowCategoryList($id)
    {
        // $data = Category::find($id)->products;
        $value = "master";
        $data = Product::with(['images' => function($query) use($value){

            $query->where('type',$value);
        }
        ])->where('category_id',$id)->get();
        $category = Category::all();
        $brand  = Brand::all();
        $isExist = Product::where('category_id', $id)->first();

       

        return view('user.category_list',[
            'data'=>$data,
            'category'=>$category,
            'isExist' => $isExist,
            'brand'=>$brand,
            ]);
    }

    public function ShowBrandList($id)
    {
        $value = "master";
        $data = Product::with(['images' => function($query) use($value){

            $query->where('type',$value);
        }
        ])->where('brand_id',$id)->get();
        $isExist = Product::where('brand_id', $id)->first();
        $brand  = Brand::all();

        $category = Category::all();
        return view('user.brand_list',[
            'data'=>$data,
            'category'=>$category,
            'isExist' => $isExist,
            'brand'=>$brand,
            ]);
    }

    public function ShowProductDetail($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        $brand  = Brand::all();
        $isExist = $data->getImagesChild;

        return view('user.product_detail',[
            
            'product'=>$data,
            'category'=>$category,
            'brand'=>$brand,
            'isExist' => $isExist,
            ]);
    }

    public function search(Request $request)
    {
        $data = Product::where('title','like', '%'.$request->input('query').'%')->get();
        $category = Category::all();
      $request->session()->flash('searchquery',$request->input('query'));
  
        return view('user.search',[
            'data' => $data,
            'category' =>  $category
        ]);
    } 

    // public function autocomplete(Request $request)
    // {
    //     $datas = Product::select("title")->where("name","LIKE","%{$request->terms}%")->get();

    //     return response()->json($datas);
    // }

    public function SearchautoComplete(Request $request){
        $query = $request->get('term','');
        $products = Product::where('title','LIKE','%'.$query.'%')->get();

        $data = [];
        foreach($products as $items)
        {
            $data[] = [
                'value'=>$items->title,
                'id' => $items->id
            ];
        }
        if(count($data))
        {
            return $data;
        }
        else{
            return ['value'=>'No Result Found','id'=>''];
        }
    }

    public function showSettings()
    {

        $data = SiteSettings::select('value')->where('key','email')->get();
        return view('layouts.user',['data'=>$data]);
     
    }
}
