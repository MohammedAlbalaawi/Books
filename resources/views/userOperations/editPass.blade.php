@extends('layouts.main')

@section('nav-button')
    <div class="container d-flex justify-content-start ">
        <a class="btn btn-light mx-2" href="/">Back to Main</a>
    </div>
@endsection
@section('page-title')
    <h3>Edit User</h3>
@endsection

@section('content')

    <form action="{{route('userOperations.updatePass',Auth::id())}}" method="post">
        @csrf
        @method('put')
        <div class="col-6 mx-auto">
            <div class="mb-3">
                <div class="col-6 mx-auto">
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">{{session('error')}} </div>
                    @endif
                        @if(session('changed'))
                            <div class="alert alert-success" role="alert">{{session('changed')}} </div>
                        @endif
                </div>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="old_pass" placeholder="Enter old password">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="new_pass" placeholder="Enter new password">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="confirm_pass" placeholder="confirm password">
            </div>
            <div class="mb-3">
                <Button type="submit" class="form-control btn btn-primary" name="submit">UPDATE</Button>
            </div>
        </div>
    </form>
@endsection
