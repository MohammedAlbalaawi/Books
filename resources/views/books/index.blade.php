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
    <div class="col-6 mx-auto">
        @if($flashMsg)
            <div class="alert alert-success" role="alert">{{$flashMsg}} </div>
        @endif
    </div>
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
                <td>
                    <img src="{{asset('Images/'.$book->bookdetail->image)}}" alt="Book Picture" style="width: 50px;">
                </td>
                <td>
                    <a href="{{route('books.show',$book->id)}}" class="btn btn-success">Show</a>
                    <a href="{{route('books.edit',$book->id)}}" class="btn btn-primary">Edit</a>
                    <form action="{{route('books.destroy',$book->id)}}" method="post" style="display: inline;">
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
