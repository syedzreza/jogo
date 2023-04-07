<?php

namespace App\Http\Controllers\Backend\Cart;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function addcart(Request $request)
    {
        if (Auth::check())
        {
            $product_id = $request->get('product_id');
            $user_id = Auth::user()->id;
            $product_check = Product::where('id',$product_id)->first();
            if($product_check) {
                $cart_check = Cart::where('user_id', $user_id)->where('product_id', $product_id)->count();
                if ($cart_check == 0) {
                    $carts = new Cart();
                    $carts->product_id = $product_id;
                    $carts->quantity = "1";
                    $carts->user_id = $user_id;
                    $carts->save();
                    $cart_result = Cart::where('user_id', $user_id)->count();
                    $html = $cart_result;
                    return response()->json(['status'=> "success", 'msg'=> $product_check->name ." ". "Add to Cart successfully",'html' => $html]);
                } else {
                    return response()->json(['status' => "success", 'msg'=> $product_check->name ." "."alredy to Cart Exist"]);
                }
            }else{
                return response()->json(['msg',"Product Item Not Found"]);
            }
        }else
        {
            $product_id = $request->get('product_id');
            $cookie_id = $this->getcookie();
            $product_check = Product::where('id',$product_id)->first();
            if($product_check) {
                $cart_check = Cart::where('product_id', $product_id)->where('cookie_id',$cookie_id)->count();
                if ($cart_check == 0) {
                    $carts = new Cart();
                    $carts->product_id = $product_id;
                    $carts->cookie_id = $cookie_id;
                    $carts->quantity = "1";
                    $carts->save();
                    $cart_result = Cart::where('cookie_id',$cookie_id)->count();
                    $html = $cart_result;
                    return response()->json(['status'=> "success", 'msg'=>"Add to Cart successfully",'html' => $html]);
                } else {
                    return response()->json(['status' => "success", 'msg'=>"alredy to Cart Exist"]);
                }
            }else{
                return response()->json(['msg',"Product Item Not Found"]);
            }
        }
    }

    public function updatecart(Request $request)
    {
        if (Auth::check())
        {
            $id = $request->get('id');
            $quantity = $request->get('quantity');
            $user_id = Auth::user()->id;
            $carts = Cart::where('id',$id)->first();

            if($carts->product->in_stock >= $quantity){
                $carts->quantity = $quantity;
                $carts->save();

                $cartdata = Cart::where('user_id',$user_id)->get();
                $subtotal = 0;
                $discount = 0;
                foreach($cartdata as $cart){
                    $subtotal = $subtotal +  $cart->quantity * $cart->product->sale_price;
                    $discount = $discount + $cart->quantity * ($cart->product->regular_price - $cart->product->sale_price);
                }
                $totalAmounts = $subtotal - $discount;
                return response()->json(['status' => "success", 'msg' => "Cart Update Successfully", 'totalAmounts'=>$totalAmounts, 'sub_total'=>$subtotal, 'discount' => $discount]);
            }else{
                return response()->json(['status' => "failed", 'msg' => "Sorry . Item Not In Stock. !!!"]);
            }
        }else
        {
            $id = $request->get('id');
            $quantity = $request->get('quantity');
            $cookie_id = $this->getcookie();
            $carts = Cart::where('id',$id)->first();
            if($carts->product->in_stock >= $quantity){
                $carts->quantity = $quantity;
                $carts->save();

                $cartdata = Cart::where('cookie_id',$cookie_id)->get();
                $subtotal = 0;
                $discount = 0;
                foreach($cartdata as $cart){
                    $subtotal = $subtotal +  $cart->quantity * $cart->product->sale_price;
                    $discount = $discount + $cart->quantity * ($cart->product->regular_price - $cart->product->sale_price);
                }
                $totalAmounts = $subtotal - $discount;
                return response()->json(['status' => "success", 'msg' => "Cart Update Successfully", 'totalAmounts'=>$totalAmounts, 'sub_total'=>$subtotal, 'discount' => $discount]);
            }else{
                return response()->json(['status' => "failed", 'msg' => "Sorry . Item Not In Stock. !!!"]);
            }
        }
    }

    public function removecart(Request $request)
    {
        if(!Auth::check())
        {
            $id = $request->get('id');
            $cookie_id = $this->getcookie();
            Cart::where('id',$id)->where('cookie_id',$cookie_id)->delete();
            return response()->json(['status'=>"success", 'msg' => "Cart Remove Successfully"]);
        }else
        {
            $id = $request->get('id');
            $carts = Cart::where('id',$id)->where('user_id',Auth::user()->id)->first();

            $carts->delete();
            return response()->json(['status'=>"success", 'msg' => "Cart Remove Successfully"]);
        }
    }

    public function destroyCart()
    {
        $uid=Auth::user()->id;
        Cart::where('user_id',$uid)->delete();
        return redirect()->back()->with('success',"Cart is Remove");
    }

    public function getcookie()
    {
        $cookie_name = "cookie_id";
        $cookie_value = sha1(time());
        if(!isset($_COOKIE[$cookie_name]))
        {
            setcookie($cookie_name,$cookie_value,time() + (86400 * 30 * 12));
            return $cookie_value;
        }else
        {
            return $_COOKIE[$cookie_name];
        }
    }

    public function get_cart_details()
    {
        if (!Auth::check()) {
            $session_id = $this->getcookie();
            $cart_items=Cart::where('cookie_id',$session_id)->get();
            return $cart_items;
        }else{
            $cookie_name = "cookie_id";
            if(isset($_COOKIE[$cookie_name])) {
                $session_id = $this->getcookie();
                $cart_items=Cart::where('cookie_id',$session_id)->get();
                $user_cart_item=Cart::where('user_id',Auth::user()->id)->pluck('product_id')->toArray();
                foreach ($cart_items as $item){
                    if(in_array($item->product_id,$user_cart_item)){
                        Cart::where('id',$item->id)->delete();
                    }else {
                        Cart::where('id', $item->id)->update([
                            'cookie_id' => null,
                            'user_id' => Auth::user()->id,
                        ]);
                    }
                }
                setcookie($cookie_name, "",time() - (86400 * 30 * 12));
            }
            $cart_items=Cart::where('user_id',Auth::user()->id)->get();
            return $cart_items;

        }
    }
}
