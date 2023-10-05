@extends('layouts.app')

@section('content')


<form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" accept=".csv">
    <button type="submit">Import Users</button>
</form>

<a href="{{ route('users.download-template') }}">Download User Template</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@endsection
