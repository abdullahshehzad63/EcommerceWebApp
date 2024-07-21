<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    
    public function index(){
        $user_id = session()->get('id');
        $old_cartItems = Cart::where('user_id', $user_id)->get();
    
        foreach($old_cartItems as $item){
            $product = Product::find($item->prod_id);
    
            // Check if the product exists and if its quantity is sufficient
            if(!$product || $product->quantity <= $item->prod_qty){
                // If the product is out of stock or doesn't exist, remove it from the cart
                Cart::where('user_id', $user_id)->where('prod_id', $item->prod_id)->delete();
            }
        }
    
        $cartItems = Cart::where('user_id', $user_id)->get();
        return view('checkout', compact('cartItems'));
    }

    public function placeorder(Request $request){
        $order = new Order();
        $order->user_id = session()->get('id');
        $order->firstname = $request->input('firstname');
        $order->lastname = $request->input('lastname');
        $order->country = $request->input('country');
        $order->address = $request->input('street');
        $order->town = $request->input('town');
        $order->state = $request->input('city');
        $order ->postcode = $request->input('postcode');
        $order->phonenumber = $request->input('phone');
        $order->email = $request->input('email');
        $order->ordernote = $request->input('ordernote');
        $order->tracking_no = 'abdullah'.rand(1111,9999);
        $order->save();

        $cartItems = Cart::where('user_id',session()->has('id'))->get();
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id'=>$order->id,
                'prod_id' =>$item->prod_id,
                'qty'=>$item->prod_qty,
                'price'=>$item->products->price,
            ]);

            $prod = Product::where('id',$item->prod_id)->first();
            $prod->quantity = $prod->quantity = $item->prod_qty;
            $prod->update();
        }

        $cartItems = Cart::where('user_id',session()->has('id'))->get();
        Cart::destroy($cartItems);

        return redirect('/')->with('status','order has been placed successfully');
    }
    
    

    
    
}



