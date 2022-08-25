<?php
namespace App\Http\Controllers;

use App\Models\Department;
?>
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
    @if($flashMsg)
        <div class="alert alert-success" role="alert">{{$flashMsg}} </div>
    @endif

    <table class="table  table-hover  mx-auto text-center">
        <thead class="table-dark ">
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Department</th>
            <th scope="col">Language</th>
            <th scope="col">Year</th>
            <th scope="col">Image</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($books as $book)
            <tr style="height: auto;vertical-align: middle;">
                <td>{{ $book->title }}</td>
                <td>{{$book->author->name}}</td>
                <td>{{$book->bookdetail->department->name ?? null}}</td>
                <td>{{$book->bookdetail->language}}</td>
                <td>{{$book->bookdetail->year}}</td>
                <td><img src="{{asset('Images/'.$book->bookdetail->image)}}" alt="Book Picture" style="width: 50px;"</td>
                <td>
                    <a href="" class="btn btn-success">Show</a>
                    <a href="" class="btn btn-primary">Edit</a>
                    <form action="" method="post" style="display: inline;">
                        @csrf
                        @method('delete')

                        <button class="btn btn-danger" type="submit" style="border: none;outline:none;">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
