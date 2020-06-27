@extends('app')

@section('title', 'Business')

@section('content')
<div class="sub-title" style="background-image: url({{ url('image/show/'.$business->cover_image) }}), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)) !important;
    background-blend-mode: overlay;">
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
                <div class="image image-business">
                    <img class="img-max-width" src="{{ url('image/show/'.$business->cover_image) }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <i class="fas fa-user fa-lg"></i><br>
                        <strong>Client: </strong>
                        <p>{{ $business->client }}</p>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <i class="fas fa-users-cog fa-lg"></i><br>
                        <strong>Consultant: </strong>
                        <p>{{ $business->consultant }}</p>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <i class="fas fa-drafting-compass fa-lg"></i><br>
                        <strong>Designer: </strong>
                        <p>{{ $business->designer }}</p>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <i class="fas fa-hard-hat fa-lg"></i><br>
                        <strong>Main Contractor: </strong>
                        <p>{{ $business->constructor }}</p>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <i class="far fa-clock fa-lg"></i><br>
                        <strong>Contract Period: </strong>
                        <p>{{ $business->contract_period }}</p>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <i class="fas fa-dollar-sign fa-lg"></i><br>
                        <strong>Contract Value: </strong>
                        <p>{{ $business->contract_value }}</p>
                    </div>
                    <!--
                    <div class="col-md-12">
                        <strong>Description: </strong>
                        {!! $business->description !!}
                    </div>
                    -->
                    <div class="col-sm-12 col-md-12">
                        <i class="fas fa-list-alt fa-lg"></i><br>
                        <strong>Scope of Work: </strong>
                        {!! $business->scope_of_work !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section style="background-image: url({{ url('image/show/'.$business->cover_image) }}), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
background-blend-mode: overlay;
background-size: cover;
width: 100%; color: #FFFFFF; background-position: center center; padding: 50px 0 50px 0 !important;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-white" style="padding-bottom: 25px;">Project Photo</h1>
            </div>
            @foreach($business->images as $image)
                <div class="col-sm-6 col-md-4">
                    <div class="image image-business-project">
                        <img class="img-max-width" src="{{ url('image/show/'.$image->id) }}" alt="">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
