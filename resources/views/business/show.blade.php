@extends('app')

@section('title', __('messages.home.webTitle'))

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
                    @if ($business->client != '')
                    <div class="col-sm-6 col-md-6">
                        <strong>{{ __('messages.business.client') }}: </strong>
                        <p>{{ $business->client }}</p>
                    </div>
                    @endif
                    @if ($business->consultant != '')
                    <div class="col-sm-6 col-md-6">
                        <strong>{{ __('messages.business.consultant') }}: </strong>
                        <p>{{ $business->consultant }}</p>
                    </div>
                    @endif
                    @if ($business->designer != '')
                    <div class="col-sm-6 col-md-6">
                        <strong>{{ __('messages.business.designer') }}: </strong>
                        <p>{{ $business->designer }}</p>
                    </div>
                    @endif
                    @if ($business->contractor != '')
                    <div class="col-sm-6 col-md-6">
                        <strong>{{ __('messages.business.contractor') }}: </strong>
                        <p>{{ $business->contractor }}</p>
                    </div>
                    @endif
                    @if ($business->main_contractor != '')
                    <div class="col-sm-6 col-md-6">
                        <strong>{{ __('messages.business.mainContractor') }}: </strong>
                        <p>{{ $business->main_contractor }}</p>
                    </div>
                    @endif
                    @if ($business->contract_start != '' && $business->contract_end != '')
                    <div class="col-sm-6 col-md-6">
                        <strong>{{ __('messages.business.contractPeriod') }}: </strong>
                        <p>{{ date('F Y', strtotime($business->contract_start)) }} -
                            {{ date('F Y', strtotime($business->contract_end)) }}</p>
                    </div>
                    @endif
                    @if ($business->scope_of_work != '')
                    <div class="col-sm-6 col-md-6">
                        <strong>{{ __('messages.business.scopeOfWork') }}: </strong>
                        {!! $business->scope_of_work !!}
                    </div>
                    @endif
                    @if ($business->social_facebook != '' || $business->social_youtube != '' || $business->social_instagram != '' || $business->social_website != '')
                    <div class="col-md-6">
                        <div class="business-icon">
                            @if ($business->social_facebook != '')
                            <i class="fab fa-facebook fa-2x" onclick="window.location.href='{{ $business->social_facebook }}'"></i>
                            @endif
                            @if ($business->social_youtube != '')
                            <i class="fab fa-youtube fa-2x" onclick="window.location.href='{{ $business->social_youtube }}'"></i>
                            @endif
                            @if ($business->social_instagram != '')
                            <i class="fab fa-instagram fa-2x" onclick="window.location.href='{{ $business->social_instagram }}'"></i>
                            @endif
                            @if ($business->social_website != '')
                            <i class="fas fa-globe fa-2x" onclick="window.location.href='{{ $business->social_website }}'"></i>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<section style="background-image: url({{ url('image/show/'.$business->cover_image) }}), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
background-blend-mode: overlay;
background-size: cover;
width: 100%; color: #FFFFFF; background-position: center center; padding: 50px 0 30px 0 !important;">
    <div class="container">
        <div class="row">
            @foreach($business->images as $image)
            <div class="col-sm-6 col-md-4">
                <div class="image image-business-project">
                <a href="{{ url('image/show/'.$image->id) }}" data-fancybox="images">
                    <img class="img-max-width" src="{{ url('image/show/'.$image->id) }}"/>
                </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
