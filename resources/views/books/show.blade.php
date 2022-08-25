<?php

namespace App\Http\Controllers;

use App\Models\Department;

?>
@extends('layouts.main')

@section('nav-button')
    <div class="container d-flex justify-content-start ">
        <a class="btn btn-light mx-2" href="/">Back to Main</a>
        <a class="btn btn-light" href="{{route('books.create')}}">Book Details</a>
    </div>
@endsection
@section('page-title')
    <h3>Books</h3>
@endsection

@section('content')
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
            <tr style="height: auto;vertical-align: middle;">
                <td>{{ $book->title }}</td>
                <td>{{$book->author->name}}</td>
                <td>{{$book->bookdetail->department->name ?? null}}</td>
                <td>{{$book->bookdetail->language}}</td>
                <td>{{$book->bookdetail->year}}</td>
                <td><img src="{{asset('Images/'.$book->bookdetail->image)}}" alt="Book Picture" style="width: 50px;"
                </td>

            </tr>

        </tbody>
    </table>
@endsection
