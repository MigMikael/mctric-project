@extends('app')

@section('title', 'Business')

@section('content')
<div class="sub-title">
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
                <h1 class="bottom15">{{ $business->name }}</h1>
                <p>{{ $business->description }}</p>
            </div>
            <div class="col-md-6">
                <img src="{{ url('image/show/'.$business->cover_image) }}" style="width: 100%; height: 100%; object-fit: contain">
            </div>
        </div>
    </div>
</section>
<section class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 style="padding-bottom: 50px;">Project Photo</h1>
            </div>
            @foreach($business->images as $image)
                <div class="col-md-4">
                    <div class="image">
                        <img class="img-show" src="{{ url('image/show/'.$image->id) }}" alt="">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
