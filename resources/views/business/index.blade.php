@extends('app')

@section('title', 'Business')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                Business
            </h1>
            <a href="{{ url('businesses/create') }}" class="btn btn-primary">Create</a>
        </div>
    </div>
    <section class="bg-white">
        <hr>
        @foreach($businesses as $business)
            <h1>Name: {{ $business->name }}</h1>
            @if($business->client != "")
                <h2>Client: {{ $business->client }}</h2>
            @endif
            @if($business->consultant != "")
                <p>Consultant: {{ $business->consultant }}</p>
            @endif
            @if($business->designer != "")
                <p>Designer: {{ $business->designer }}</p>
            @endif
            @if($business->constructor != "")
                <p>Constructor: {{ $business->constructor }}</p>
            @endif
            @if($business->contract_value != "")
                <p>Contract Value: {{ $business->contract_value }}</p>
            @endif
            @if($business->contract_period != "")
                <p>Contract Peroid: {{ $business->contract_period }}</p>
            @endif
            @if($business->scope_of_work != "")
                <p>Scope Of Work: {{ $business->scope_of_work }}</p>
            @endif
            <div class="col-md-12">
                <a href="{{ url('businesses/'. $business->id ."/edit") }}" class="btn btn-warning">Edit</a>
                {!! Form::model($business, ['method' => 'delete', 'url' => '/businesses/'.$business->id]) !!}
                <button class="btn btn-danger" type="submit">Delete</button>
                {!! Form::close() !!}
            </div>
            <hr>
        @endforeach
    </section>
@endsection
