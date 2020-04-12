@extends('app')

@section('title', 'Award')

@section('content')
    <div class="sub-title" style="background-image: url({{ url('image/show/'.$award->image_id) }}) !important;">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                {!! $award->name !!}
            </h1>
        </div>
    </div>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Name</h4>
                            <p>{!! $award->name !!}</p>
                            <hr>
                            <h4>Description</h4>
                            <p>{!! $award->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
