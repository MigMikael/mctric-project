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
                <p>We aim to bring our wealth of experience to the management of any construction or re-fit programme.</p>
                <p>This leaves our customers to continue with their core business interests unimpeded by unnecessary distractions. Virtus Contracts Limited undertake office refits / refurbishments, interior design, property construction / alteration projects and contract management.</p>
                <p>Engaging with Virtus means that you have instant access to our broad range of Construction Management expertise over all industry and business sectors.</p>
            </div>
            <div class="col-md-6">
                <div class="image">
                    <img src="{{ url('image/show/'.$business->image) }}" alt="">
                </div>
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
            <div class="col-md-4">
                <div class="image">
                    <img class="img-show" src="{{ url('image/show/'.$business->image) }}" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="image">
                    <img class="img-show" src="{{ url('image/show/'.$business->image) }}" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="image">
                    <img class="img-show" src="{{ url('image/show/'.$business->image) }}" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="image">
                    <img class="img-show" src="{{ url('image/show/'.$business->image) }}" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="image">
                    <img class="img-show" src="{{ url('image/show/'.$business->image) }}" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="image">
                    <img class="img-show" src="{{ url('image/show/'.$business->image) }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
