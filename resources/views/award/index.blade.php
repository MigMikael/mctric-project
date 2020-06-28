@extends('app')

@section('title', 'Award')

@section('content')
<header class="sub-title">
    <div class="sub-title-overlay"></div>
    <div class="container h-100">
        <div class="d-flex h-100 text-center align-items-center" style="padding-top: 60px;">
            <div class="w-100 text-white" style="z-index: 3">
                <h1 class="text-ellipsis text-center">
                    {{ __('messages.award.awardHeading') }}
                </h1>
            </div>
        </div>
    </div>
</header>
<section class="bg-white">
    <div class="container">
        <div id="columns">
        @foreach($awards as $award)
        <figure>
            <img src="{{ url('image/show/'.$award->image_id) }}"
                alt="Card image cap">
        </figure>
        @endforeach
        </div>
    </div>
</section>
@endsection