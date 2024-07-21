@extends('layouts.admin')
@section('content')

    <div class="container">
        <h2 class="text-center text-danger" >Update Categories</h2>
        <form action="/update/{{$categories->id}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('put')
            <label for="">Name</label>
            <input type="text" name="name" value="{{$categories->name}}" class="form-control m-2"  >
            <label for="">Author</label>
            <input type="text" name="author" value="{{$categories->author}}" class="form-control m-2"  >
            <label for="">Description</label>
            <textarea name="body" id="" class="form-control m-2" cols="10" rows="3">{{$categories->body}}</textarea>
            <img src="{{asset('cover/'.$categories->cover)}}" width="100px" alt="">
            <label for="">Image</label>
            <input type="file" class="form-control m-2" name="cover" id="">
            <button type="submit" class="btn btn-success"  >Update</button>
        </form>
    </div>
    
@endsection