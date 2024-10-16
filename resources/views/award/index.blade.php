@extends('app')

@section('title', __('messages.home.webTitle'))

@section('content')
    <header class="sub-title">
        <div class="sub-title-overlay"></div>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white" style="z-index: 3">
                    <h1 class="text-ellipsis text-center">
                        {{ __('messages.award.awardHeading') }}
                    </h1>
                </div>
            </div>
        </div>
    </header>
    <section class="services bg-white">
        <div class="container">
            <div class="row">
                @foreach ($awards as $award)
                    <div class="col-md-4 col-lg-4">
                        <a href="{{ url('awards/' . $award->id) }}">
                            <div class="service-box"
                                style="background-image: url(https://images.pexels.com/photos/310479/pexels-photo-310479.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940), linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3));">
                                <div class="services-wrapper">
                                    <h4>{{ $award->name }}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
