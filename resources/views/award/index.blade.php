@extends('app')

@section('title', 'Award')

@section('content')
<header class="sub-title">
    <div class="sub-title-overlay"></div>
    <div class="container h-100">
        <div class="d-flex h-100 text-center align-items-center" style="padding-top: 60px;">
            <div class="w-100 text-white" style="z-index: 3">
                <h1 class="text-ellipsis text-center">
                    {{ __('messages.award.awardHeading') }}
                </h1>
            </div>
        </div>
    </div>
</header>
<section class="bg-white">
    <div class="container">
        <div class="row">
            @foreach($awards as $award)
            <div class="col-md-4 col-lg-4">
                <div class="card" onclick="location.href='{{ url('awards/'.$award->id) }}'">
                    <img class="card-img-top" src="https://images.unsplash.com/photo-1578269174936-2709b6aeb913?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1051&q=80">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $award->name }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection