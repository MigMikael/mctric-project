@extends('app')

@section('title', __('messages.home.webTitle'))

@section('content')
<header class="sub-title">
    <div class="sub-title-overlay"></div>
    <div class="container h-100">
        <div class="d-flex h-100 text-center align-items-center" style="padding-top: 60px;">
            <div class="w-100 text-white" style="z-index: 3">
                <h1 class="text-ellipsis text-center">
                    {{ __('messages.client.clientHeading') }}
                </h1>
            </div>
        </div>
    </div>
</header>
<section class="bg-white">
    <div class="container">
        <div class="row">
            @foreach($clients as $client)
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="card" style="cursor: unset !important;">
                    <div class="image">
                        <img class="card-img-top" src="{{ url('image/show/'.$client->image_id) }}" style="height: 100% !important;">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection