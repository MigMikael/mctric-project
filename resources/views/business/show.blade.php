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
                    @if($business->client != '')
                    <div class="col-sm-6 col-md-6">
                        <i class="fas fa-user fa-lg"></i>
                        <strong>{{ __('messages.business.client') }}: </strong>
                        <p>{{ $business->client }}</p>
                    </div>
                    @endif
                    @if($business->consultant != '')
                    <div class="col-sm-6 col-md-6">
                        <i class="fas fa-users-cog fa-lg"></i>
                        <strong>{{ __('messages.business.consultant') }}: </strong>
                        <p>{{ $business->consultant }}</p>
                    </div>
                    @endif
                    @if($business->designer != '')
                    <div class="col-sm-6 col-md-6">
                        <i class="fas fa-drafting-compass fa-lg"></i>
                        <strong>{{ __('messages.business.designer') }}: </strong>
                        <p>{{ $business->designer }}</p>
                    </div>
                    @endif
                    @if($business->constructor != '')
                    <div class="col-sm-6 col-md-6">
                        <i class="fas fa-hard-hat fa-lg"></i>
                        <strong>{{ __('messages.business.mainContractor') }}: </strong>
                        <p>{{ $business->constructor }}</p>
                    </div>
                    @endif
                    @if($business->contract_period != '')
                    <div class="col-sm-6 col-md-6">
                        <i class="far fa-clock fa-lg"></i>
                        <strong>{{ __('messages.business.contractPeriod') }}: </strong>
                        <p>{{ $business->contract_period }}</p>
                    </div>
                    @endif
                    @if($business->contract_value != '')
                    <div class="col-sm-6 col-md-6">
                        <i class="fas fa-dollar-sign fa-lg"></i>
                        <strong>{{ __('messages.business.contractValue') }}: </strong>
                        <p>{{ $business->contract_value }}</p>
                    </div>
                    @endif
                    @if($business->scope_of_work != '')
                    <div class="col-sm-6 col-md-6">
                        <i class="fas fa-list-alt fa-lg"></i>
                        <strong>{{ __('messages.business.scopeOfWork') }}: </strong>
                        {!! $business->scope_of_work !!}
                    </div>
                    @endif
                    <!--
                    <div class="col-md-12">
                        <strong>Description: </strong>
                        {!! $business->description !!}
                    </div>
                    -->
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
                <h1 class="text-white" style="padding-bottom: 25px;">{{ __('messages.business.projectPhoto') }}</h1>
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