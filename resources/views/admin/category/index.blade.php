@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="left">
            <a href="/create" class="btn btn-outline-succes" >Add Category</a>
        </div>
        <div class="right">
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
                            <th scope="col">Author</th>
                            <th>Descriptioni</th>
                            <th>Image</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($categories as $category)
                        <tr class="">
                            <td scope="row">{{$count}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->author}}</td>
                            <td>{{$category->body}}</td>
                            <td><img src="{{asset('cover/'.$category->cover)}}" width="100px" alt=""></td>
                            <td>
                                <a href="/edit/{{$category->id}}" class="btn btn-warning" >Edit</a>
                            </td>
                            <td>
                                <form action="/delete/{{$category->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this category?')" class="btn btn-danger">Delete</button>
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
            
        </div>
    </div>

@endsection