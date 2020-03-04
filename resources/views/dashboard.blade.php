@extends('app')

@section('title', 'Business')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                Admin Dashboard
            </h1>
        </div>
    </div>
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                Business
            </h1>
            <a href="{{ url('businesses/create') }}" class="btn btn-primary">Create</a>
        </div>
    </div>
@endsection
