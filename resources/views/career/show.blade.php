@extends('app')

@section('title', 'Career')

@section('content')
    <div class="sub-title" style="background-image: url({{ url('image/show/'.$career->image_id) }}) , linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)) !important;
        background-blend-mode: overlay;">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                {!! $career->name !!}
            </h1>
        </div>
    </div>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-content">
                        <div class="card-body">
                            <h4>Description</h4>
                            <p>{!! $career->description !!}</p>
                            <hr>
                            <h4>Qualification</h4>
                            <p>{!! $career->qualification !!}</p>
                        </div>
                        <div class="card-footer text-center" style="background-color: #FFFFFF !important;
                        border-top: unset !important;">
                            <button type="button" class="btn learn-more-btn"
                            onclick="location.href='http://www.mctric.com/fromwork'">
                            APPLY
                        </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
