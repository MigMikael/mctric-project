@extends('app')

@section('title', __('messages.home.webTitle'))

@section('content')
    <div class="sub-title"
        style="background-image: url({{ url('image/show/' . $career->image_id) }}) , linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)) !important;
        background-blend-mode: overlay;">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                {!! $career->name !!}
            </h1>
        </div>
    </div>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-content" style="padding-top: 5px; padding-bottom: 25px;">
                        <div class="card-body">
                            <h5>{{ __('messages.career.description') }}</h5>
                            <p>{!! $career->description !!}</p>
                            <hr>
                            <h5>{{ __('messages.career.qualification') }}</h5>
                            <p>{!! $career->qualification !!}</p>
                        </div>
                        <div class="card-footer text-center"
                            style="background-color: #FFFFFF !important; border-top: unset !important;">
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLScLzMQHHkAObKzT2A-SQ2L4QFRKwMB7gcjc13gP1Wb9C5IBeA/viewform"
                                class="btn learn-more-btn">
                                {{ __('messages.career.applyBtn') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
