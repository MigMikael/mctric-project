@extends('app')

@section('title', 'Business')

@section('content')
    <div class="full-screen" style="background-image: url({{ url('image/show/'.$business->image) }});">
        <div class="col-xl-5 col-lg-6 col-md-7 col-sm-12 col-xs-12" style="background-color: rgba(255, 255, 255, 0.7); top: 30%; padding: 5%">
            <h1>{{ $business->name }}</h1>
            @if($business->client != "")
                <h3>Client: {{ $business->client }}</h3>
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
                <p>Contract Period: {{ $business->contract_period }}</p>
            @endif
            @if($business->scope_of_work != "")
                <p>Scope Of Work: {{ $business->scope_of_work }}</p>
            @endif
            @if(Auth::check())
                <div class="col-md-12">
                    {!! Form::model($business, ['method' => 'delete', 'url' => '/businesses/'.$business->id]) !!}
                    <a href="{{ url('businesses/'. $business->id ."/edit") }}" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger" type="submit">Delete</button>
                    {!! Form::close() !!}
                </div>
            @endif
        </div>
    </div>
@endsection
