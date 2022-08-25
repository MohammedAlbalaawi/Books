@extends('layouts.main')

@section('nav-button')
    <div class="container d-flex justify-content-start ">
        <a class="btn btn-light mx-2" href="/">Back to Main</a>
    </div>
@endsection
@section('page-title')
    <h3>Edit Author</h3>
@endsection

@section('content')

    <form action="{{route('authors.update',$author->id)}}" method="post">
        @csrf
        @method('put')
        <div class="col-6 mx-auto">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" value="{{$author->name}}">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="country" value="{{$author->country}}">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="email" value="{{$author->email}}">
            </div>
            <div class="mb-3">
                <Button type="submit" class="form-control btn btn-primary" name="submit">SUBMIT</Button>
            </div>
        </div>
    </form>
@endsection
