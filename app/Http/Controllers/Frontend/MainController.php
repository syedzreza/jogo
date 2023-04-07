<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
use App\Category;
use App\HomePage;
use App\HomePageImage;
use App\Http\Controllers\Backend\Cart\CartController;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\ProductImage;
use App\User;
use App\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Compound;

class MainController extends Controller
{
     public function home()
     {
         $products = Product::all();
         $cart=new CartController();
         $cart_items=$cart->get_cart_details();

         $categories = Category::all();
         $homepages = HomePage::all();
         $homepageimages = HomePageImage::all();
         return view('Frontendtheme.pages.home',compact('categories','homepages','cart_items','homepageimages','categories','products'));
     }

     public function product($slug)
     {
         $categories = Category::all();
         $cart=new CartController();
         $cart_items=$cart->get_cart_details();
         $cats = Category::where('slug',$slug)->value('id');
         $products = Product::where('cat_id',$cats)->orderBy('id','asc')->paginate(8);

         return view('Frontendtheme.pages.product',compact('products','cart_items','categories'));
     }

     public function product_list()
     {
         $categories = Category::all();
         $cart=new CartController();
         $cart_items=$cart->get_cart_details();
         return view('Frontendtheme.pages.product_list',compact('cart_items','categories'));
     }

     public function filtercat(Request $request)
     {
         $data = Product::where('id','>','0');
         if($request->cat_id) {
             $data= $data->whereIn('cat_id',$request->cat_id);
         }
         if($request->price)
         {
             if($request->price == 1)
             {
                 $data= $data->whereBetween('sale_price',[1,9]);
             }
             elseif ($request->price == 2)
             {
                 $data= $data->whereBetween('sale_price',[10,19]);
             }
             elseif ($request->price == 3)
             {
                 $data= $data->whereBetween('sale_price',[20,29]);
             }
             else
             {
                 $data= $data->whereBetween('sale_price',[30,39]);
             }
         }

         $data = $data->paginate(8);
         $html = '';
         if (count($data)>0) {
         foreach ($data as $product)
         {
             $html .=
                 '<div class="col-md-3">
                     <div class="product-list">
                        <a href=" '.route('productdetails',$product->slug).' ">
                             <div class="image">
                                 <img src=" '.url('/').'/Product/image/'.$product->product_image.' "  style="object-fit:fill" alt="">
                             </div>
                             <div class="details">
                                 <h4 style="font-size: 21px;">'.$product->product_name.'</h4>
                                 <h6>$'.$product->sale_price.'</h6>
                             </div>
                         </a>
                         <form method="POST" action="">
                             <div class="shop-cart">
                                 <input type="hidden" name="product_id" id="pro_id" value="'.$product->id.'">
                                 <input type="hidden" name="quantity" value="1">';
             if($product->in_stock>0)
             {
                 $html .= '<button type="button" class="btn1" id="addcart'.$product->id.'" value="'.$product->id.'" onclick="add_cart('.$product->id.')">Add to Cart <i data-feather="shopping-cart"></i></button>';
             }
             else
             {
                 $html .= '<button type="button" class="btn1">Out Of Stock</button>';
             }

             $html .= '</div>
                         </form>
                     </div>
                 </div>';
         }
         return response()->json(['data' => $data, 'html' => $html,'pagination'=>(string) $data->links('Frontendtheme.pages.custom')]);
         }
         else
         {
             $html .= '<h1 style="margin-top: 272px">No Data Found....</h1>';
         }

         return response()->json(['html' => $html]);
     }

     public function productdetails($slug)
     {
         $products = Product::all();
         $categories = Category::all();
         $cart=new CartController();
         $cart_items=$cart->get_cart_details();
         $productdetails = Product::where('slug',$slug)->first();
         $productsimage = ProductImage::where('product_id',$productdetails->id)->get();
         $cat_id = $productdetails->cat_id;
         $relate_products = Product::where('cat_id',$cat_id)->where('id', '!=',$productdetails->id )->get();
         return view('Frontendtheme.pages.product_details',compact('productdetails','relate_products','productsimage','cart_items','categories','products'));
     }

     public function cart()
     {
         $products = Product::all();
         $cart=new CartController();
         $cart_items=$cart->get_cart_details();
         $categories = Category::all();
         return view('Frontendtheme.pages.cart',compact('cart_items','categories','products'));
     }

     public function header()
     {
         $cart=new CartController();
         $cart_items=$cart->get_cart_details();
         $categories = Category::all();
         $products = Product::all();
         return view('Frontendtheme.layouts.header',compact('cart_items','categories','products'));
     }

     public function Myaccount(Request $request)
     {
         if (Auth::check())
         {
             $products = Product::all();
             $categories = Category::all();
             $cart=new CartController();
             $cart_items=$cart->get_cart_details();
             $userdetails = User::where('id',Auth::user()->id)->first();
             $orders = Order::with('orderdetail')->where('user_id',Auth::user()->id)->get();
//             $orderdetails = DB::table('orders')->join('order_details','orders.id','=','order_details.order_id')
//                             ->join('products','order_details.product_id','=','products.id')
//                             ->join('carts','products.id','=','carts.product_id')
//                             ->select('orders.id','products.product_name','products.product_image','products.sale_price','carts.quantity')
//                             ->get();
//             dd($orderdetails);

             $useraddress = UserAddress::where('user_id',Auth::user()->id)->get();
             return view('Frontendtheme.pages.myaccount',compact('cart_items','userdetails','useraddress','categories','products','orders'));
         }
         else
         {
             return view('Frontendtheme.Auth.login');
         }

     }

     public  function orderdetail($id)
     {
         $products = Product::all();
         $categories = Category::all();
         $cart=new CartController();
         $cart_items=$cart->get_cart_details();
         $orderdetails = Order::where('id',$id)->where('user_id',Auth::user()->id)->first();
         return view('Frontendtheme.pages.order_details',compact('orderdetails','cart_items','categories','products'));
     }

     public function checkoutpage()
     {
         if(Auth::check()){
             $products = Product::all();
             $categories = Category::all();
             $user_id = Auth::user()->id;
             $cart=new CartController();
             $cart_items=$cart->get_cart_details();
             $useraddress = UserAddress::where('user_id',$user_id)->limit(3)->orderBy('id','desc')->get();
             return view('Frontendtheme.pages.checkoutpage',compact('cart_items','useraddress','categories','products'));
         }else{
             return redirect()->route('loginfront');
         }
     }
}
