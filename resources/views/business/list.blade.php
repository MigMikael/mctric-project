@extends('app')

@section('title', 'Business')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                {{ __($categoryTranslate) }}
            </h1>
        </div>
    </div>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                @foreach($businesses as $business)
                <div class="col-md-6 col-lg-4">
                    <div class="card" onclick="location.href='{{ url('businesses/'.$business->id) }}'">
                        <img class="card-img-top" src="{{ url('image/show/'.$business->cover_image) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $business->name }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row" style="justify-content: center">
                {{ $businesses->links() }}
            </div>
        </div>
    </section>
@endsection
