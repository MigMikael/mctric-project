@extends('app')

@section('title', 'Business')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                {{ $business->name }}
            </h1>
        </div>
    </div>
    <section class="bg-white">
        <hr>
        <div>
            <h2>Client: {{ $business->client }}</h2>
            <p>Consultant: {{ $business->consultant }}</p>
            <p>Designer: {{ $business->designer }}</p>
            <p>Constructor: {{ $business->constructor }}</p>
            <p>Contract Value: {{ $business->contract_value }}</p>
            <p>Contract Period: {{ $business->contract_period }}</p>
            <p>Scope Of Work: {{ $business->scope_of_work }}</p>
        </div>
    </section>
@endsection
