@extends('app')

@section('title', 'Business')

@section('content')
<div class="sub-title" style="background-image: url({{ url('image/show/'.$business->cover_image) }}) !important;">
    <div class="container">
        <h1 class="text-ellipsis text-center">
            {{ $business->name }}
        </h1>
    </div>
</div>
<section class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="bottom15">{{ $business->name }}</h1>
                <p><strong>Client: </strong> {{ $business->client }}</p>
                <p><strong>Consultant: </strong> {{ $business->consultant }}</p>
                <p><strong>Designer: </strong> {{ $business->designer }}</p>
                <p><strong>Main Contractor: </strong> {{ $business->constructor }}</p>
                <p><strong>Contract Period: </strong> {{ $business->contract_period }}</p>
                <p><strong>Contract Value: </strong> {{ $business->contract_value }}</p>
                <p><strong>Description: </strong> {!! $business->description !!}</p>
                <p><strong>Scope of Work: </strong> {!! $business->scope_of_work !!}</p>
            </div>
            <div class="col-md-6">
                <div class="image">
                    <img class="img-show image-business" src="{{ url('image/show/'.$business->cover_image) }}">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-white" style="padding-bottom: 25px;">Project Photo</h1>
            </div>
            @foreach($business->images as $image)
                <div class="col-sm-6 col-md-4">
                    <div class="image image-business-project">
                        <img class="img-show" src="{{ url('image/show/'.$image->id) }}" alt="">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
