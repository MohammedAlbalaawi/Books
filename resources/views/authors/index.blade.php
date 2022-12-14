@extends('layouts.main')

@section('nav-button')
    <div class="container d-flex justify-content-start ">
        <a class="btn btn-light mx-2" href="/">Back to Main</a>
        <a class="btn btn-light" href="{{route('authors.create')}}">Add New Author</a>
    </div>
@endsection
@section('page-title')
    <h3>Authors</h3>
@endsection

@section('content')
    <div class="col-6 mx-auto">
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{session('success')}} </div>
        @endif
    </div>
    <table class="table  table-hover w-75 mx-auto text-center">
        <thead class="table-dark ">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Country</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($authors as $author)
            <tr style="height: auto;vertical-align: middle;">
                <td>{{$author->name}}</td>
                <td>{{$author->country}}</td>
                <td>{{$author->email}}</td>

                <td>
                    <a href="{{route('authors.show',$author->id)}}" class="btn btn-success">Show</a>
                    @if(Auth::user())
                    <a href="{{route('authors.edit',$author->id)}}" class="btn btn-primary">Edit</a>
                    <form action="{{route('authors.destroy',$author->id)}}" method="post" style="display: inline;">
                        @csrf
                        @method('delete')

                        <button class="btn btn-danger"
                                type="submit" style="border: none;outline:none;">Delete</button>
                    </form>
                    @endif
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
