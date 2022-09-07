@extends('layouts.main')

@section('nav-button')
    <div class="container d-flex justify-content-start ">
        <a class="btn btn-light mx-2" href="/">Back to Main</a>
    </div>
@endsection
@section('page-title')
    <h3>New User</h3>
@endsection

@section('content')
    <!-- Show Error Messages -->
    <div class="col-6 mx-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <form action="{{route('users.store')}}" method="post" id="authorForm">
        @csrf
        <div class="col-6 mx-auto">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" placeholder="Enter Name">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="email" placeholder="Enter email">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="password" placeholder="Enter password">
            </div>
            <div class="mb-3" style="background-color:#f2f2f2; padding-left: 10px; border-radius: 5px;">
                <label class="form-label">Roles</label>
                @foreach($roles as $role)
                    <div>
{{--                        <input type="checkbox" name="roleName">--}}
                        <input type="checkbox" name="roles[]" value="{{$role->id}}"  >
                        <label>{{$role->name}}</label>
                    </div>
                @endforeach
            </div>
            <div class="mb-3">
                <Button type="submit" class="form-control btn btn-primary" name="submit">SUBMIT</Button>
            </div>
        </div>
    </form>
@endsection

