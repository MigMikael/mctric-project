@extends('app')

@section('title', 'Business')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                {{ $category }}
            </h1>
        </div>
    </div>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                @foreach($businesses as $business)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <img class="card-img-top" src="{{ url('image/show/'.$business->image) }}"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $business->name }}</h5>
                                <div class="text-center">
                                    <button type="button" class="btn learn-more-btn"
                                            onclick="location.href='{{ url('businesses/'.$business->id) }}'">
                                        รายละเอียด
                                    </button>
                                </div>
                            </div>
                            @if(Auth::check())
                                <div class="card-footer text-center">
                                    {!! Form::model($business, ['method' => 'delete', 'url' => '/businesses/'.$business->id]) !!}
                                    <a href="{{ url('businesses/'. $business->id ."/edit") }}" class="btn btn-warning">Edit</a>
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                    {!! Form::close() !!}
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
