@extends('layouts.admin')
@section('content')
<a href="/createProduct" class="btn btn-info" >Add Product</a>
<div
    class="table-responsive"
>
    <table
        class="table table-primary"
    >
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Quantity</th>

                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
                
            @endphp
            @foreach ($products as $product)
            <tr class="">
                <td scope="row">{{$count}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->body}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <img src="{{asset('coverimage/'.$product->image)}}" width="100px" alt="">
                </td>
                <td>{{$product->quantity}}</td>
                <td>
                    <a href="/editProduct/{{$product->id}}" class="btn btn-warning" >Edit</a>
                </td>
                <td>
                    <form action="/delete/{{$product->id}}" method="post">
                        @csrf
                        @method('delete')
                        <button  class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this proudct')" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @php
                $count++;
            @endphp
          @endforeach
           
            
        </tbody>
    </table>
</div>

    
@endsection

{{-- This is the product controller of what we mean to say and we all are belong to same kind of things and the probablity of this is very low. --}}