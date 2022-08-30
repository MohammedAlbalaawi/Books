@extends('layouts.main')

@section('nav-button')
    <div class="container d-flex justify-content-start ">
        <a class="btn btn-light mx-2" href="{{route('books.index')}}">Books</a>
        <a class="btn btn-light" href="{{route('authors.index')}}">Authors</a>
        <a class="btn btn-light mx-2" href="{{route('departments.index')}}">Departments</a>
        @if(Auth::user())
            <a class="btn btn-light mx-2" href="{{route('userOperations.index')}}">Logout</a>
        @else
            <a class="btn btn-light mx-2" href="{{route('userOperations.index')}}">Login</a>
        @endif
    </div>
@endsection

@section('page-title')
    @if(Auth::check())
    <div class="row">
            <div class="col-6 mx-auto">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">{{session('success')}} </div>
                @endif
            </div>

    </div>
    <div class="row">
        <div class="col">
            Welcome : {{Auth::user()->name}}
        </div>
    </div>
    <div class="row">
        <div class="col ">
            Email : {{Auth::user()->email}}
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-dark mx-2 my-3" href="{{route('userOperations.edit',Auth::id())}}">Edit Information</a>
            <a class="btn btn-dark mx-2" href="{{route('userOperations.editPass',Auth::id())}}">Edit Password</a>
        </div>
    </div>
    @endif
@endsection
