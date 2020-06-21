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
                @foreach($careers as $career)
                <div class="col-md-6 col-lg-4">
                    <div class="card" onclick="location.href='{{ url('careers/'.$career->id) }}'">
                        <img class="card-img-top" src="{{ url('image/show/'.$career->image_id) }}" alt="">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                {!! $career->name !!}
                            </h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
