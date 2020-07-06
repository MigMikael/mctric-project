@extends('app')

@section('title', 'Award')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                {!! $award->name !!}
            </h1>
        </div>
    </div>
    <section class="bg-white">
        <div class="container">
            <div class="card" style="padding: 25px; cursor: unset !important;">
                <div style="text-align: center">
                    <img src="{{ url('image/show/'.$award->image_id) }}" style="width: 100%;
                    max-width: 400px;
                    height: auto;">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $award->description }}</h5>
                </div>
            </div>
        </div>
    </section>
@endsection
