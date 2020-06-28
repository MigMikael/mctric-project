@extends('app')

@section('title', 'Award')

@section('content')
<div class="sub-title">
    <div class="container">
        <h1 class="text-ellipsis text-center">
            {{ __('messages.award.awardHeading') }}
        </h1>
    </div>
</div>
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