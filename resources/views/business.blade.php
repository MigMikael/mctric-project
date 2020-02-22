@extends('app')

@section('title', 'Business')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                Business
            </h1>
        </div>
    </div>
    <section class="bg-white">
        <hr>
        @foreach($businesses as $business)
            <h1>Name: {{ $business->name }}</h1>
            <h2>Client: {{ $business->client }}</h2>
            <hr>
        @endforeach
    </section>
@endsection
