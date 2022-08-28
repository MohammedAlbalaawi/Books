@extends('layouts.main')

@section('nav-button')
    <div class="container d-flex justify-content-start ">
        <a class="btn btn-light mx-2" href="{{route('books.index')}}">Books</a>
        <a class="btn btn-light" href="{{route('authors.index')}}">Authors</a>
        <a class="btn btn-light mx-2" href="{{route('departments.index')}}">Departments</a>
        <a class="btn btn-light mx-2" href="{{route('userOperations.index')}}">Logout</a>
    </div>
@endsection

@section('page-title')
    <h3>Website</h3>
@endsection
