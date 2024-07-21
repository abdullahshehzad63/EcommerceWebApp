<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }
    public function create(){
        return view('admin.products.createProduct');
    }
    public function store(Request $request){
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move('coverimage/',$filename);

            $products = new Product([
                'name'=>$request->name,
                'body'=>$request->body,
                'price'=>$request->price,
                'quantity'=>$request->quantity,
                'image'=>$filename
            ]);
            $products->save();
        }

        return redirect('/dashboard');
    }

    public function editProduct($id){
        $products = Product::find($id);
        return view('admin.products.editProduct',compact('products'));
    }
  
    public function updateProduct(Request $request,$id){
        $products = Product::find($id);
        if($request->hasFile('image')){
            if(File::exists('coverimage/'.$products->image)){
                File::delete('coverimage/'.$products->image);
            }

            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move('coverimage/',$filename);
            $products->image = $filename;
        }
     $products->update([
        'name'=>$request->name,
        'body'=>$request->body,
        'price'=>$request->price,
        'quantity'=>$request->quantity,
     ]);
        return redirect('/dashboard');
    }
   
    public function destroyProduct($id){
        $products = Product::find($id);
        if(File::exists('coverimage/'.$products->image)){
            File::delete('coverimage/'.$products->image);
        }
        $products->delete();
        return redirect('/dashboard');
    }
}



// Inorder to meet the current consequences of war but war is not a solution about all of its strategies
