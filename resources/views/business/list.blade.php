@extends('app')

@section('title', __('messages.home.webTitle'))

@section('content')
<header class="sub-title">
    <div class="sub-title-overlay"></div>
    <div class="container h-100">
        <div class="d-flex h-100 text-center align-items-center">
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
                        <div class="card-body" style="min-height: 100px;">
                            <h5 class="card-title text-center">{{ $business->name }}</h5>
                            @if(Request::is('dashboard/businesses/status/*'))
                            <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $business->completion }}%" aria-valuenow="{{ $business->completion }}" aria-valuemin="0" aria-valuemax="100">{{ $business->completion }}%</div>
                              </div>
                            @endif
                        </div>
                        @if(Request::is('dashboard/businesses/status/*'))
                        <div class="card-footer text-center">
                            {!! Form::model($business, ['method' => 'delete', 'url' =>
                            '/businesses/'.$business->id]) !!}
                            <a href="{{ url('businesses/'. $business->id .'/edit/') }}"
                               class="btn btn-warning">{{ __('messages.app.editButton') }}</a>
                            <button class="btn btn-danger"
                                    type="submit">{{ __('messages.app.deleteButton') }}</button>
                            {!! Form::close() !!}
                        </div>
                        @endif
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
