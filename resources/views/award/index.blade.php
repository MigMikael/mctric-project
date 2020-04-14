@extends('app')

@section('title', 'Award')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                AWARDS
            </h1>
        </div>
    </div>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center" style="padding-bottom: 50px;">Awards and Accreditations</h1>
                </div>
                @foreach($awards as $award)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="image">
                                <img class="card-img-top"
                                src="{{ url('image/show/'.$award->image_id) }}"
                                alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">
                                    {!! $award->name !!}
                                </h5>
                                <div class="text-center">
                                    <button type="button" class="btn learn-more-btn"
                                            onclick="location.href='{{ url('awards/'.$award->id) }}'">
                                        READ MORE
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
