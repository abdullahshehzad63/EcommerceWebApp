@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Add Product </h2>
            <div class="col-lg-3">
                {{-- <p>Cover</p>
                <form action="/deleteCover/{{ $products->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn text-danger">X</button>
                </form>
                <img src="{{ asset('coverimage/' . $products->image) }}" width="100px" alt="">
                <br>
                <br>
                <hr>
                <p>Multiple Images</p> --}}
                {{-- @if (count($products->multipleimages) > 0)
                    @foreach ($products->multipleimages as $img)
                    <form action="/deleteimages/{{$img->id}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn text-danger" >X</button>
                    </form>
                    <img src="{{asset('multipleimages/'.$img->multipleimage)}}" alt="">
                    @endforeach
                    @endif --}}
                {{-- @if (count($products->multipleimages) > 0)
                    @foreach ($products->multipleimages as $img)
                        <form action="/deleteImages/{{ $img->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn text-danger">X</button>
                        </form>
                        <img src="{{ asset('images/' . $img->multipleimage) }}" width="100px" alt="">
                    @endforeach
                @endif --}}
                {{-- @if ($products->mutipleimages && count($products->mutipleimages) > 0)
                    @foreach ($products->multipleimages as $img)
                        <form action="/deleteImages/{{ $img->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn text-danger">X</button>
                        </form>
                        <img src="{{ asset('mutipleimages/' . $img->multipleimage) }}" width="100px" alt="">
                    @endforeach
                @endif --}}

                {{-- @if ($products->multipleimages && count($products->multipleimages) > 0)
    @foreach ($products->multipleimages as $img)
        <form action="/deleteImages/{{ $img->id }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn text-danger">X</button>
        </form>
        <img src="{{ asset('mutipleimages/' . $img->multipleimage) }}" width="100px" alt="">
    @endforeach
@endif --}}


            </div>
            <div class="col-lg-6">
                <form action="/update/{{ $products->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $products->name }}" class="form-control m-2">
                    <label for="">Description</label>
                    <textarea name="body" id="" cols="10" rows="3" class="form-control m-2">{{ $products->body }}</textarea>
                    <label for="">Price</label>
                    <input type="text" name="price" value="{{ $products->price }}" class="form-control m-2">
                    <label for="">Quantity</label>
                    <input type="text" name="quantity" value="{{ $products->quantity }}" class="form-control m-2">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                    <hr>
                    
                    <button type="submit" class="btn btn-success">Edit Product</button>
                </form>
            </div>

        </div>

    </div>

@endsection
