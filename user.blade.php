@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="container">
   
    <div class="row">
        <div class="col-sm-2">
        <h1>User List</h1>
        </div>
        <div class="col-sm-5"></div>
        <div class="col-sm-3">
            <form action="{{ route('users.search') }}" method="GET">
                <input type="text" name="search" placeholder="Search Users">
                <button type="submit">Search</button>
            </form>
        </div>
        <div class="col-sm-2">
            <a href="{{ route('users.create') }}" class="btn btn-success mb-3">
                <i class="fa fa-plus"></i> Add User
            </a>
        </div>
    </div>


    <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>City</th>
                <th>Gender</th>
                <th>Hobbies</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->contact_number }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->city }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ $user->hobbies }}</td>
                <td>
                    <a href="{{ route('users.edit', ['id' => $user->user_id]) }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil"></i> 
                    </a>
                    <a href = "{{ route('users.delete', ['id' => $user->user_id]) }}" class="btn btn-danger btn-sm delete-user" data-id="{{ $user->user_id }}">
                        <i class="fa fa-trash"></i> 
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
