@extends('app')

@section('title', __('messages.home.webTitle'))

@section('content')
<header class="sub-title">
    <div class="sub-title-overlay"></div>
    <div class="container h-100">
        <div class="d-flex h-100 text-center align-items-center">
            <div class="w-100 text-white" style="z-index: 3">
                <h1 class="text-ellipsis text-center">
                    {!! $award->name !!}
                </h1>
            </div>
        </div>
    </div>
</header>
<section class="bg-white">
    <div class="container">
        <div class="card" style="padding: 25px; cursor: unset !important; margin-bottom: 0px !important;
        box-shadow: none !important; border: none !important">
            <div style="text-align: center">
                <img src="{{ url('image/show/'.$award->image_id) }}" style="width: 100%;
                    max-width: 400px;
                    height: auto;">
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">{!! $award->description !!}</h5>
            </div>
        </div>
    </div>
</section>
@endsection
