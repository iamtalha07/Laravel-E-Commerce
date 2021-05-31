<?php

use App\Cart;
use App\Order;
use App\Product;
use App\Category;
// use Session;
use App\OrderDetails;
use App\SiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//User
Route::get('user_register','CustomerController@showRegister')->name('user_register');
Route::post('userregister','CustomerController@registerUser');
Route::get('user_login','CustomerController@showlogin')->name('user_login');
Route::post('userlogin','CustomerController@loginUser');
Route::get('dashboard','UserDashboardController@index');
Route::get('userlogout', function () {
   Session::forget('user');
   
    return redirect('/');
});
Route::get('mail-message','CustomerController@mailMessage');
Route::get('verify','CustomerController@verifyUser');






//Customer Dashboard
Route::get('/','UserDashboardController@ShowDashboard')->name('user_dashboard');
Route::get('product-list','UserDashboardController@ShowProductList')->name('product-list');
Route::get('category-list/{id}','UserDashboardController@ShowCategoryList')->name('category-list');
Route::get('product-detail/{id}','UserDashboardController@ShowProductDetail')->name('product-detail');
Route::get('brand-list/{id}','UserDashboardController@ShowBrandList')->name('brand-list');
Route::get('search', 'UserDashboardController@search');
Route::get('/searchajax','UserDashboardController@SearchautoComplete')->name('searchproductajax');



//Customer Cart
Route::get('cart','CartController@ShowCart');
Route::post('add_to_cart','CartController@addToCart')->name('add_to_cart');
//Route::get('removecart/{id}','CartController@removeCart');
Route::delete('removecart/{id}', 'CartController@removeCart');
Route::get('cartupdate/{rowId}', 'CartController@update');

//Customer Wishlist
Route::get('wishlist','WishlistController@ShowWishlist');
Route::get('add-wishlist','WishlistController@addToWishlist')->name('add-wishlist');
Route::post('wishlist-to-cart','WishlistController@addToCart')->name('add-wishlist');





//Customer Checkout
Route::get('checkout', 'CheckoutController@showCheckOut');
Route::post('orderplace', 'CheckoutController@orderPlace');

//Paypal
Route::get('returnPaypal','CheckoutController@returnPaypal')->name('process.paypal'); //change name from controller
Route::get('cancelPaypal','CheckoutController@cancelPaypal')->name('cancel.paypal');
Route::get('paypal','CheckoutController@paypal')->name('checkout.paypal');
Route::get('stripe','CheckoutController@stripe')->name('stripe');

//Sending Data to Layout.user blade
View::composer(['*'], function ($view) {

    $topProducts = OrderDetails::select('products.id as id','products.title as title','products.price as price','images.image as image',DB::raw('SUM(order_details.quantity) as total'))
    ->groupBy('products.id','products.title','products.price','images.image')
    ->orderBy('total','desc')->take(3)
    ->join('products','products.id','=','order_details.product_id')
    ->join('images',function($join){
        $join->on('images.imageable_id','=','order_details.product_id')->where('images.imageable_type','App\Product')->where('images.type','master'); 
    })
    ->get();

    $settings = SiteSettings::get()->pluck('value','key')->toArray();
    
    $view->with(compact('settings','topProducts'));
});


// Route::view('stripe','user.stripe');
Route::post('ok', 'CheckoutController@ok');











Route::get('hello', function () {
 
    $user = OrderDetails::select('products.id as id','products.title as title','products.price as price','images.image as image',DB::raw('SUM(order_details.quantity) as total'))
    ->groupBy('products.id','products.title','products.price','images.image')
    ->orderBy('total','desc')->take(1)
    ->join('products','products.id','=','order_details.product_id')
    ->join('images',function($join){
        $join->on('images.imageable_id','=','order_details.product_id')->where('images.imageable_type','App\Product')->where('images.type','master'); 
    })
    ->get();
    // echo $user;
    foreach($user as $u)
    {
        echo $u->title;
    }


});





Route::get('a','EmployeesController@index');
Route::get('/getUsers/{id}','EmployeesController@getUsers');






















//Admin
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
// Route::prefix('admin')->group(function () {

// });

Route::get('customers','HomeController@showCustomer');

Route::get('customers-chart','HomeController@CustomerChart');





//Categories
Route::get('categories','CategoryController@show')->name('categories');
Route::get('add_categories','CategoryController@addcategory')->name('add_categories');
Route::post('addcategory','CategoryController@store');
Route::get('deletecategory/{id}','CategoryController@destroy');
Route::get('edit_categories/{id}','CategoryController@edit');
Route::post('editcategories/{id}','CategoryController@update');

//products
Route::get('products','ProductController@show')->name('products');
Route::get('add-products','ProductController@addProduct')->name('add-products');
Route::post('addproduct','ProductController@store');
Route::get('delete/{id}','ProductController@destroy');
Route::get('edit/{id}','ProductController@edit');
Route::post('editproduct/{id}','ProductController@update');

//atrributes
Route::get('add-attributes/{id}','ProductController@addAtrributes');
Route::post('add_attributes/{id}','ProductController@storeAttributes');




//Images
Route::get('add-images/{id}','ProductController@addImages');
Route::post('add_image_product/{id}','ProductController@addMultiImages');

//category Images
Route::get('add-category-images/{id}','CategoryController@multipleImages');
Route::post('add_image_category/{id}','CategoryController@categoryMultipleImages');

//orders
Route::get('orders','OrderController@index')->name('orders');
Route::get('order_detail/{id}','OrderController@ShowOrderDetail');
Route::get('order_status/{id}','OrderController@ChangeStatus');

//Banners
Route::get('banner','BannerController@index')->name('banner');
Route::get('add_banner','BannerController@addBanner')->name('add_banner');
Route::post('addbanner','BannerController@store');
Route::get('edit_banner/{id}','BannerController@edit');
Route::post('editbanner/{id}','BannerController@update');
Route::get('delete_banner/{id}','BannerController@destroy');

//Brands
Route::get('brand','BrandController@index')->name('brand');
Route::get('add_brand','BrandController@addBrand')->name('add_brand');
Route::post('addbrand','BrandController@store');
Route::get('delete_brand/{id}','BrandController@destroy');
Route::get('edit_brand/{id}','BrandController@edit');
Route::post('editbrand/{id}','BrandController@update');

//Dashboard Images
Route::get('add_dashboard_images','DashboardImageController@addImage')->name('add_dashboard_images');
Route::post('add-dashboard-image','DashboardImageController@store');

//feature
Route::get('feature','FeatureController@index')->name('feature');
Route::get('add_feature','FeatureController@addFeature')->name('add_feature');
Route::post('addfeature','FeatureController@store');
Route::get('edit_feature/{id}','FeatureController@edit');
Route::post('editfeature/{id}','FeatureController@update');
Route::get('deletefeature/{id}','FeatureController@destroy');














//Settings
Route::get('view-details','SettingsController@viewDetails')->name('view-details');
Route::get('add_details','SettingsController@addDetails')->name('add_details');
Route::post('add-detail','SettingsController@store');




Route::get('store-details','SettingsController@storeDetails')->name('store-details');
Route::post('storedetails/{id}','SettingsController@update');





































Route::get('/mproducts/{id}', function ($id) {

$value = "master";
$product = Product::with(['images' => function($query) use($value){

    $query->where('type',$value);
}
])->get();

foreach($product as $item)
{
    echo $item->title."<br>";
    foreach($item->images as $photo)
    {
        echo $photo->type."<br>";
  
    } 
}
});

Route::get('/abc', function () {
   // $category = Category::find(21)->products;


    // $value="master";
    // $category = Category::find(21)->products;
 
    
    // $data = $category->products->images()->where('type','master')->first();

    // $value = "master";
    // $product = Product::with(['images' => function($query) use($value){
    
    //     $query->where('type',$value);
    // }
    // ])->where('category_id',20)->get();
    
    // foreach($product as $item)
    // {
    //     echo $item->title."<br>";
    //     echo $item->price."<br>";
    //     foreach($item->images as $photo)
    //     {
    //         echo $photo->type."<br>";
      
    //     } 
    // }
    
//     $userId = Session::get('user')['id'];
//    // $data = Cart::where('customer_id',$userId)->get();


//     $value = "master";
//     $data = Cart::with(['products' => ['images' => function($query) use($value){

//         $query->where('type',$value);
//     }]
//     ])->where('customer_id',$userId)->get();

$userId = Session::get('user')['id'];
$data = Cart::where('customer_id',$userId)->get();


    
    foreach($data as $item)
    {
        // echo $item->products->images;

        foreach($item->products->getImages as $aa)
        {
            echo $aa->type."<br>";
        }
    }



    
 });
 

Route::get('/mcategories/{id}', function ($id) {
    $product = Category::find($id);
    dd($product->images);
});








//Route::match(['get','post'],'admin/add-edit-products/{id?}','ProductController@addEditProduct');
