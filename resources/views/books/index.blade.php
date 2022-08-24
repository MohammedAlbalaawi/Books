@extends('layouts.main')

@section('nav-button')
    <div class="container d-flex justify-content-start ">
        <a class="btn btn-light mx-2" href="/">Back to Main</a>
        <a class="btn btn-light" href="{{route('books.create')}}">Add New Book</a>
    </div>
@endsection
@section('page-title')
    <h3>Books</h3>
@endsection

@section('content')

@endsection
