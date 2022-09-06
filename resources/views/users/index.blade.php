@extends('layouts.main')

@section('nav-button')
    <div class="container d-flex justify-content-start ">
        <a class="btn btn-light mx-2" href="/">Back to Main</a>
        <a class="btn btn-light" href="{{route('departments.create')}}">Add New User</a>
    </div>
@endsection
@section('page-title')
    <h3>Users</h3>
@endsection

@section('content')
    <div class="col-6 mx-auto">
        @if($flashMsg)
            <div class="alert alert-success" role="alert">{{$flashMsg}} </div>
        @endif
    </div>
    <table class="table  table-hover w-75 mx-auto text-center">
        <thead class="table-dark ">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr style="height: auto;vertical-align: middle;">
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $roleName)
                            <span class="badge bg-success mx-auto">{{ $roleName }}</span>
                        @endforeach
                    @endif
                </td>

                <td>
                    <a href="" class="btn btn-success">Show</a>
                    @if(Auth::user())
                    <a href="" class="btn btn-primary">Edit</a>
                    <form action="{{route('users.destroy',$user->id)}}" method="post" style="display: inline;">
                        @csrf
                        @method('delete')

                        <button class="btn btn-danger"
                                type="submit" style="border: none;outline:none;">Delete</button>
                    </form>
@endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
