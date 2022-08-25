@extends('layouts.main')

@section('nav-button')
    <div class="container d-flex justify-content-start ">
        <a class="btn btn-light mx-2" href="/">Back to Main</a>
        <a class="btn btn-light" href="{{route('departments.create')}}">Add New Department</a>
    </div>
@endsection
@section('page-title')
    <h3>Departments</h3>
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
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($departments as $department)
            <tr style="height: auto;vertical-align: middle;">
                <td>{{$department->name}}</td>

                <td>
                    <a href="" class="btn btn-success">Show</a>
                    <a href="" class="btn btn-primary">Edit</a>
                    <form action="{{route('departments.destroy',$department->id)}}" method="post" style="display: inline;">
                        @csrf
                        @method('delete')

                        <button class="btn btn-danger"
                                type="submit" style="border: none;outline:none;">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
