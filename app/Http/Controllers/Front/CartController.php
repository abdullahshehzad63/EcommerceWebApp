<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addProduct(Request $request){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        if(session()->has('id')){
            $product = Product::find($product_id);
            if(Cart::where('prod_id',$product_id)->where('user_id',session()->get('id'))->exists()){
                return response()->json(['status'=>'Product is Already in the cart']);
            }
            else{
                $cart = new Cart();
                $cart->user_id = session()->get('id');
                $cart->prod_id = $product_id;
                $cart->prod_qty = $product_qty;
                $cart->save();
                return response()->json(['status'=>'Product is added to cart successfully']);
            }
        }
        else{
            return response()->json(['status'=>'Please Login to continue']);
        }
    }

    public function viewCart(Request $request){
        $cartItems = Cart::with('products')->where('user_id',session()->get('id'))->get();
        return view('shopping_cart',compact('cartItems'));
    }

    // public function deleteProduct(Request $request){
    //     if(session()->has('id')){
    //         $prod_id = $request->input('prod_id');
    //         if(Cart::where('prod_id',$prod_id)->where('user_id',session()->get('id'))->exists()){
    //             $cart = Cart::where('prod_id',$prod_id)->where('user_id',session()->get('id'))->first();
    //             $cart->delete();
    //             return response()->json(['status'=>'The product is deleted successfully']);
    //         }
    //     }
    //     else{
    //         return response()->json(['status'=>'Please Login to continue']);
    //     }
    // }
    public function deleteProduct(Request $request)
{
    if (session()->has('id')) {
        $prod_id = $request->input('prod_id');
        $user_id = session()->get('id');
        
        if (Cart::where('prod_id', $prod_id)->where('user_id', $user_id)->exists()) {
            $cart = Cart::where('prod_id', $prod_id)->where('user_id', $user_id)->first();
            $cart->delete();
            return response()->json(['status' => true, 'message' => 'The product is deleted successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'Product not found in cart']);
        }
    } else {
        return response()->json(['status' => false, 'message' => 'Please login to continue']);
    }
}

    // public function updateCart(Request $request){
    //     $prod_id = $request->input('prod_id');
    //     $product_qty = $request->input('prod_qty');
    //     if(session()->has('id')){
    //         if(Cart::where('prod_id',$prod_id)->where('user_id',session()->get('id'))->exists()){
    //             $cart = Cart::where('prod_id',$prod_id)->where('user_id',session()->get('id'))->first();
    //             $cart->prod_qty = $product_qty;
    //             $cart->update();
    //             return response()->json(['status'=>'Product is updated Successfully']);
    //         }
    //     }
    //     else{
    //         return response()->json(['status'=>'Please Login to continue']);
    //     }
    // }

public function updateCart(Request $request)
{
    $prod_id = $request->input('prod_id');
    $product_qty = $request->input('prod_qty');

    if (session()->has('id')) {
        $user_id =session()->get('id'); // Get the authenticated user's ID

        $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', $user_id)->first();

        if ($cartItem) {
            $cartItem->prod_qty = $product_qty;
            $cartItem->save();

            // Calculate the updated price for the item
            $updatedPrice = $cartItem->products->price * $cartItem->prod_qty;

            // Calculate the updated total for the cart
            $total = Cart::where('user_id', $user_id)->get()->sum(function ($cartItem) {
                return $cartItem->products->price * $cartItem->prod_qty;
            });

            return response()->json([
                'status' => true,
                'message' => 'Product is updated successfully',
                'updated_qty' => $cartItem->prod_qty,
                'updated_price' => $updatedPrice,
                'updated_total' => $total
            ]);
        } else {
            return response()->json(['status' => false, 'message' => 'Product not found in cart']);
        }
    } else {
        return response()->json(['status' => false, 'message' => 'Please login to continue']);
    }
}
}
