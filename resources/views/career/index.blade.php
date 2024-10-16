@extends('app')

@section('title', __('messages.home.webTitle'))

@section('content')
    <header class="sub-title">
        <div class="sub-title-overlay"></div>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white" style="z-index: 3">
                    <h1 class="text-ellipsis text-center">
                        {{ __('messages.career.careerHeading') }}
                    </h1>
                </div>
            </div>
        </div>
    </header>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                @foreach ($careers as $career)
                    <div class="col-md-6 col-lg-4">
                        <a href="{{ url('careers/' . $career->id) }}" style="text-decoration: none !important;">
                            <div class="card">
                                <img class="card-img-top" src="{{ url('image/show/' . $career->image_id) }}" alt="">
                                <div class="card-body">
                                    <h5 class="card-title text-center" style="color: #000;">
                                        {!! $career->name !!}
                                    </h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
