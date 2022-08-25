@extends('layouts.main')

@section('nav-button')
    <div class="container d-flex justify-content-start ">
        <a class="btn btn-light mx-2" href="/">Back to Main</a>
        <a class="btn btn-light" href="{{route('authors.create')}}">Add New Author</a>
    </div>
@endsection
@section('page-title')
    <h3>Author Details</h3>
@endsection

@section('content')

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

        <tr style="height: auto;vertical-align: middle;">
            <td>{{$author->name}}</td>
            <td>{{$author->country}}</td>
            <td>{{$author->email}}</td>
        </tr>

        </tbody>
    </table>
@endsection
