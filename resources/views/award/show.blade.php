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
            <div class="card" style="padding: 25px">
                <div class="row">
                    <div class="col-md-6">
                        <div class="text-center">
                            <img src="{{ url('image/show/'.$award->image_id) }}" style="width: 100%">
                        </div>
                    </div>
                    <div class="col-md-6 vertical-center">
                        <div>
                            <h4>Name</h4>
                            <p>{!! $award->name !!}</p>
                            <h4>Description</h4>
                            <p>
                                {!! $award->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
