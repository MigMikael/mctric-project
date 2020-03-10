@extends('app')

@section('title', 'Career')

@section('content')
    <div class="sub-title" style="background-image: url({{ url('image/show/'.$career->image_id) }}) !important;">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                {!! $career->name !!}
            </h1>
        </div>
    </div>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <!--
                        <img class="card-img-top"
                             src="{{ url('image/show/'.$career->image_id) }}"
                             alt="Card image cap">
                        -->
                        <div class="card-body">
                            <h4>Description</h4>
                            <p>{!! $career->description !!}</p>
                            <hr>
                            <h4>Qualification</h4>
                            <p>{!! $career->qualification !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
