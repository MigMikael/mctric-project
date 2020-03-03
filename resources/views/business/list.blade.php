@extends('app')

@section('title', 'Business')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                {{ $category }}
            </h1>
        </div>
    </div>

    <section class="bg-white">
        <hr>
        <div>
            @foreach($businesses as $business)
            <a href="{{ url('businesses/'.$business->id) }}">
                <div style="background-image: url('{{ url('image/show/'.$business->image) }}'); background-size: cover; padding-top: 3%; padding-bottom: 3%">
                    <div class="col-md-6" style="background-color: rgba(255, 255, 255, 0.7)">
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
                            {!! Form::model($business, ['method' => 'delete', 'url' => '/businesses/'.$business->id]) !!}
                                <a href="{{ url('businesses/'. $business->id ."/edit") }}" class="btn btn-warning">Edit</a>
                                <button class="btn btn-danger" type="submit">Delete</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </a>
        <hr>
        @endforeach
        </div>
    </section>
@endsection
