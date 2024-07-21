<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $orders = Order::where('user_id',session()->has('id'))->get();
                return view('order',compact('orders'));

    }
}
