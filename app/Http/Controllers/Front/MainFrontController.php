<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainFrontController extends Controller
{
    public function index(){
        $frontProducts = Product::all();
        return view('index',compact('frontProducts'));
    }
    public function about(){
        return view('about');
    }
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function checkout(){
        return view('checkout');
    }
    public function contact(){
        return view('contact');
    }
    public function shop_details($id){
        $products = Product::find($id);
        return view('shop_details',compact('products'));
    }
    public function shop(){
        return view('shop');
    }
    public function shopping_cart(){
        return view('shopping_cart');
    } 
    public function blog_details(){
        return view('blog_details');
    } 

    // public function loginUser(Request $request){
    //     $userLogin = User::where('email',$request->input('email'))->first();
    //     if($userLogin && password_verify($request->input('password'),$userLogin->password))
    //     {
    //         session()->put('id',$userLogin->id);
    //         return redirect('/');
    //     }
    //     else
    //     {
    //         return redirect('login')->with('error','Invalid Credentials');
    //     }
    // }
    public function loginUser(Request $request){
        $userLogin = User::where('email',$request->input('email'))->first();
        if($userLogin && password_verify($request->input('password'),$userLogin->password)){
            session()->put('id',$userLogin->id);
            return redirect('/');
        }
        else{
            return redirect('login')->with('error','Invalid Credentials');
        }
    }

    // public function registeredUser(Request $request){
    //     if($request->hasFile('image')){
    //         $file = $request->file('image');
    //         $filename = time().'_'.$file->getClientOriginalName();
    //         $file->move('users/',$filename);

    //         $user = new User();
    //         $user->name = $request->input('name');
    //         $user->email = $request->input('email');
    //         $user->image = $filename;
    //         $user->password = $request->input('password');
    //         $user->save();
    //     }
    //     return redirect('login')->with('success','Congratulations! your account has been created Successfully');

    // }
    public function registeredUser(Request $request){
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move('user/',$filename);

            $users = new User();
            $users->name = $request->input('name');
            $users->email = $request->input('email');
            $users->image = $filename;
            $users->password = $request->input('password');
            $users->save();
        }
        return redirect('login')->with('success','Congratulations! Your account has been created Successfully');
    }
    // public function logout(){
    //     session()->forget('id');
    //     return redirect('/login');
    // }
    public function logout(){
        session()->forget('id');
        return redirect('/login');
    }
    
}
