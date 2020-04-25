@extends('app')

@section('title', 'Career')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                {{ __('messages.career.careerHeading') }}
            </h1>
        </div>
    </div>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center" style="padding-bottom: 50px;">{{ __('messages.career.jobOpening') }}</h1>
                </div>
                @foreach($careers as $career)
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="image">
                            <img class="card-img-top"
                            src="{{ url('image/show/'.$career->image_id) }}"
                            alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                {!! $career->name !!}
                            </h5>
                            <div class="text-center">
                                <button type="button" class="btn learn-more-btn"
                                        onclick="location.href='{{ url('careers/'.$career->id) }}'">
                                    {{ __('messages.career.readMoreButton') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
