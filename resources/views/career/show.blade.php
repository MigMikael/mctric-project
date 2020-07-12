@extends('app')

@section('title', 'Career')

@section('content')
    <div class="sub-title" style="background-image: url({{ url('image/show/'.$career->image_id) }}) , linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)) !important;
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
                    <div class="card-content">
                        <div class="card-body">
                            <h5>{{ __('messages.career.description') }}</h5>
                            <p>{!! $career->description !!}</p>
                            <hr>
                            <h5>{{ __('messages.career.qualification') }}</h5>
                            <p>{!! $career->qualification !!}</p>
                        </div>
                        <div class="card-footer text-center" style="background-color: #FFFFFF !important;
                        border-top: unset !important;">
                            <button type="button" class="btn learn-more-btn"
                            onclick="location.href='https://docs.google.com/forms/d/e/1FAIpQLScLzMQHHkAObKzT2A-SQ2L4QFRKwMB7gcjc13gP1Wb9C5IBeA/viewform'">
                            {{ __('messages.career.applyBtn') }}
                        </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
