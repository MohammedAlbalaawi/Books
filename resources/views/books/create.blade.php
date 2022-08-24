@extends('layouts.main')

@section('nav-button')
    <div class="container d-flex justify-content-start">
        <a class="btn btn-light" href="/">Back to Main</a>
    </div>
@endsection
@section('page-title')
    <h3>New Book</h3>
@endsection

@section('content')
    <form action="{{route('books.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-6 mx-auto">
            <div class="mb-3">
                <input type="text" class="form-control" name="title" placeholder="Enter title">
            </div>
            <div class="mb-3 row">
                <div class="col-auto">
                    <label class="col-form-label">Author</label>
                </div>
                <div class="col">
                <select class="form-control" name="authorName">
                    @foreach($authors as $author)
                    <option >{{$author->name}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="mb-3">
                <h3> Book Details</h3>
            </div>
            <div class="mb-3">
                <select class="form-control" name="language">
                    <option >Arabic</option>
                    <option >English</option>
                </select>
            </div>
            <div class="mb-3 row">
                <div class="col-auto">
                <label class="col-form-label">Deparment</label>
                </div>
                <div class="col">
                <select class="form-control" name="departmentName">
                    @foreach($departments as $department)
                        <option>{{$department->name}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="year" placeholder="Release Year">
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" name="bookImage" >
            </div>
            <div class="mb-3">
                <Button type="submit" class="form-control btn btn-primary" name="submit">SUBMIT</Button>
            </div>
        </div>
    </form>
@endsection
