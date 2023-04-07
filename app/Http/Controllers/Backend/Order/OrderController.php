<?php

namespace App\Http\Controllers\Backend\Order;

use App\Cart;
use App\Http\Controllers\Backend\Cart\CartController;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function saveorder(Request $request)
    {
        $uid = Auth::user()->id;
        $ship_id = $request->get('shipping_id');
        $total = $request->get('total_amount');
        $pay = $request->get('payment_method');

        $orders = new Order();
        $orders->user_id = $uid;
        $orders->shipping_id = $ship_id;
        $orders->order_no = '#ecom'.rand(1111,9999);
        $orders->order_total = $total;
        $orders->order_status = "completed";
        $orders->payment_method = $pay;
        $orders->payment_status = "completed";
        $orders->save();

        $carts = Cart::where('user_id',$uid)->get();

        foreach ($carts as $cart)
        {
              OrderDetail::create([
                  'order_id' => $orders->id,
                  'product_id' => $cart->product_id,
                  'product_quantity' => $cart->quantity,
                  'product_price' => $cart->product->sale_price,
              ]);

            $product = Product::find($cart->product_id);
            $product->decrement('in_stock', $cart->quantity);
        }

        $cart=new CartController();
        $cart_items=$cart->destroyCart();

        return response()->json(['status' => "success", 'msg' => "order successfull Thanks for your order",'cart_items' => $cart_items]);
    }

    public function payonline(Request $request)
    {
        $uid = Auth::user()->id;
        $ship_id = $request->get('shipping_id');
        $total = $request->get('total_amount');
        $pay = $request->get('payment_method');

        $orders = new Order();
        $orders->user_id = $uid;
        $orders->shipping_id = $ship_id;
        $orders->order_no = '#ecom'.rand(1111,9999);
        $orders->order_total = $total;
        $orders->order_status = "pending";
        $orders->payment_method = $pay;
        $orders->payment_status = "pending";
        $orders->save();

        $carts = Cart::where('user_id',$uid)->get();

        foreach ($carts as $cart)
        {
            OrderDetail::create([
                'order_id' => $orders->id,
                'product_id' => $cart->product_id,
                'product_quantity' => $cart->quantity,
                'product_price' => $cart->product->sale_price,
            ]);
            $product = Product::find($cart->product_id);
            $product->decrement('in_stock', $cart->quantity);
        }
        $oid = $orders->id;

        $cartdata = Cart::where('user_id',Auth::user()->id)->get();
        $subtotal = 0;
        $discount = 0;
        foreach($cartdata as $cart){
            $subtotal = $subtotal +  $cart->quantity * $cart->product->sale_price;
            $discount = $discount + $cart->quantity * ($cart->product->regular_price - $cart->product->sale_price);
        }
        $totalAmounts = $subtotal - $discount;

        $name = Auth::user()->f_name.' '.Auth::user()->l_name;
        $phone = Auth::user()->phone;
        $email = Auth::user()->email;

        $cart=new CartController();
        $cart_items=$cart->destroyCart();

        return response()->json(['status' => "success",'name' => $name , 'total' =>  $totalAmounts, 'phone' => $phone ,
                          'email' => $email, 'order_id' => $oid, 'msg' => "order successfull Thanks for your order",'cart_items' => $cart_items]);
    }

    public function updatepayonline(Request $request)
    {
        $orders = Order::where('id',$request->order_id)->first();
        $orders->order_status = "completed";
        $orders->payment_status = "completed";
        $orders->pay_trans_no = $request->get('pay_trans_no');
        $orders->save();
        $cart=new CartController();
        $cart_items=$cart->destroyCart();

        return response()->json(['status' => "Place Order Successfull",'cart_items' => $cart_items]);
    }

}
