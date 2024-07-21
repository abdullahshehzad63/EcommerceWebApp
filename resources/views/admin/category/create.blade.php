@extends('layouts.admin')
@section('content')

    <div class="container">
        <h2 class="text-center text-danger" >Create Categories</h2>
        <form action="/post" enctype="multipart/form-data" method="post">
            @csrf
            <label for="">Name</label>
            <input type="text" name="name" class="form-control m-2"  >
            <label for="">Author</label>
            <input type="text" name="author" class="form-control m-2"  >
            <label for="">Description</label>
            <textarea name="body" id="" class="form-control m-2" cols="10" rows="3"></textarea>
            <label for="">Image</label>
            <input type="file" class="form-control m-2" name="cover" id="">
            <button type="submit" class="btn btn-success"  >Submit</button>
        </form>
    </div>
    
@endsection