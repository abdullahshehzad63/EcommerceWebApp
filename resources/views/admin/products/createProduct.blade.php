@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Add Product </h2>
        <form action="/post" method="post" enctype="multipart/form-data" >
            @csrf
            <label for="">Name</label>
            <input type="text" name="name" class="form-control m-2">
            <label for="">Description</label>
            <textarea name="body" id="" cols="10" rows="3" class="form-control m-2" ></textarea>
            <label for="">Price</label>
            <input type="text" name="price" class="form-control m-2">
            <label for="">Quantity</label>
            <input type="text" name="quantity" class="form-control m-2">
            <label for="">Image</label>
            <input type="file" name="image" class="form-control">
            <hr>
            
            <button type="submit" class="btn btn-success">Add Product</button>
        </form>
    </div>
    
@endsection