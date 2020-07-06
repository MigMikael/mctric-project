@extends('app')

@section('title', 'Business')

@section('content')
<header class="sub-title">
    <div class="sub-title-overlay"></div>
    <div class="container h-100">
        <div class="d-flex h-100 text-center align-items-center" style="padding-top: 60px;">
            <div class="w-100 text-white" style="z-index: 3">
                <h1 class="text-ellipsis text-center">
                    {{ __($headingTranslate) }}
                </h1>
            </div>
        </div>
    </div>
</header>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                @foreach($businesses as $business)
                <div class="col-md-6 col-lg-4">
                    <div class="card" onclick="location.href='{{ url('businesses/'.$business->id) }}'">
                        <img class="card-img-top" src="{{ url('image/show/'.$business->cover_image) }}" alt="Card image cap">
                        <div class="card-body" style="min-height: 100px !important;">
                            <h5 class="card-title text-center">{{ $business->name }} ({{ $business->completion }}%)</h5>
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
