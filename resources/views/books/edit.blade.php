@extends('layouts.main')

@section('nav-button')
    <div class="container d-flex justify-content-start">
        <a class="btn btn-light" href="/">Back to Main</a>
    </div>
@endsection
@section('page-title')
    <h3>Edit Book</h3>
@endsection

@section('content')
    <div class = "row">
        <div class=" col-3 m-auto">
            <img src="{{asset('Images/'.$book->bookdetail->image)}}" alt="Book Picture" style="width: 200px;">
        </div>
    <div class='col col-9'>
        <form action="{{route('books.update',$book->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="col-6 mx-auto">

                @include('layouts.translatable',['field' => 'title','fieldValue' => $book->getTranslations('title')])
                <div class="mb-3 row">
                    <div class="col-auto">
                        <label class="col-form-label">Author</label>
                    </div>
                    <div class="col">
                        <select class="form-control" name="authorName">
                            @foreach($authors as $author)
                                <option @if ($author->id == $book->author_id) selected @endif>{{$author->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <h3> Book Details</h3>
                </div>
                <div class="mb-3">
                    <select class="form-control" name="language">
                        <option @if ('Arabic' == $book->bookdetail->language) selected @endif>Arabic</option>
                        <option @if ('English' == $book->bookdetail->language) selected @endif>English</option>
                    </select>
                </div>
                <div class="mb-3 row">
                    <div class="col-auto">
                        <label class="col-form-label">Deparment</label>
                    </div>
                    <div class="col">
                        <select class="form-control" name="departmentName">
                            @foreach($departments as $department)
                                <option
                                    @if ($department->id == $book->bookdetail->department->id) selected @endif>{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text"
                           class="form-control @error('year') is-invalid @enderror"
                           name="year"
                           value="{{$book->bookdetail->year}}"
                           placeholder="Release Year">
                    @error('year')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="file"
                           class="form-control @error('bookImage') is-invalid @enderror"
                           name="bookImage">
                    @error('bookImage')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <Button type="submit" class="form-control btn btn-primary" name="submit">SUBMIT</Button>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection
