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
            <div class="row">
                @foreach($awards as $award)
                    <div class="col-md-6 col-lg-4">
                        <div class="card" onclick="location.href='{{ url('awards/'.$award->id) }}'">
                            <div class="image" style="height: 100% !important;">
                                <img class="award-img-wrapper card-img-top"
                                src="{{ url('image/show/'.$award->image_id) }}"
                                alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">
                                    {!! $award->name !!}
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
