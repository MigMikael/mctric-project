@extends('app')

@section('title', 'Award')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                Award
            </h1>
        </div>
    </div>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center" style="padding-bottom: 50px;">รางวัล</h1>
                </div>
                @foreach($awards as $award)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <img class="card-img-top"
                                 src="{{ url('image/show/'.$award->image_id) }}"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-center">
                                    {!! $award->name !!}
                                </h5>
                                <p>
                                    {!! $award->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
