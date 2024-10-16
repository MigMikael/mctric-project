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
            @if (Request::is('dashboard/businesses/status/*'))
                <div class="back-btn-custom">
                    <button type="button" class="btn btn-primary"
                        onclick="location.href='{{ url('dashboard/summary/') }}'">Back</button>
                </div>
            @endif

            @if (Request::is('dashboard/businesses/status/*'))
                <div class="row filter-date-wrapper">
                    <div class="col-md-12">
                        {!! Form::open([
                            'method' => 'get',
                            'url' => '/dashboard/businesses/status/' . $status,
                            'class' => '',
                        ]) !!}
                        <div class="row">
                            <div class="col-md-5 col-lg-6 form-group">
                                <h5 style="font-weight: 400; margin-top: 7px; margin-bottom: 0px;">Project Result: {{ $businesses->total() }}</h5>
                            </div>
                            <div class="col-md-4 col-lg-4 form-group">
                                {!! Form::select('year', $years, $year, ['class' => 'form-control select-filter-date']) !!}
                            </div>
                            <div class="col-md-3 col-lg-2 form-group">
                                <button class="btn btn-primary btn-block"
                                    type="submit">{{ __('messages.app.searchButton') }}</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            @elseif(Request::is('businesses/category/*'))
                <div class="row filter-date-wrapper">
                    <div class="col-md-12">
                        {!! Form::open([
                            'method' => 'get',
                            'url' => '/businesses/category/' . $category->slug,
                            'class' => '',
                        ]) !!}
                        <div class="row">
                            <div class="col-md-5 col-lg-6 form-group">
                                <h5 style="font-weight: 400; margin-top: 7px; margin-bottom: 0px;">Project Result: {{ $businesses->total() }}</h5>
                            </div>
                            <div class="col-md-4 col-lg-4 form-group">
                                {!! Form::select('year', $years, $year, ['class' => 'form-control select-filter-date']) !!}
                            </div>
                            <div class="col-md-3 col-lg-2 form-group">
                                <button class="btn btn-primary btn-block"
                                    type="submit">{{ __('messages.app.searchButton') }}</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            @endif

            <div class="row mb-3">
                @foreach ($businesses as $business)
                    <div class="col-md-6 col-lg-4">
                        <div class="card" onclick="location.href='{{ url('businesses/' . $business->id) }}'">
                            <img class="card-img-top" src="{{ url('image/show/' . $business->cover_image) }}"
                                alt="Card image cap">
                            <div class="card-body"
                                style="
                            @if (Request::is('dashboard/businesses/status/*')) height: 180px;
                            @else
                            height: 130px;
                            @endif
                            ">
                                <h5 class="card-title text-center">{{ $business->name }}</h5>
                                <div class="text-center">
                                    <span style="font-size: 14px;">{{ date('F Y', strtotime($business->contract_start)) }} -
                                    {{ date('F Y', strtotime($business->contract_end)) }}</span>
                                </div>
                                @if (Request::is('dashboard/businesses/status/*'))
                                    <div class="progress" style="margin-top: 25px; margin-bottom: 10px;">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{ $business->completion }}%"
                                            aria-valuenow="{{ $business->completion }}" aria-valuemin="0"
                                            aria-valuemax="100">{{ $business->completion }}%</div>
                                    </div>
                                @endif
                            </div>
                            @if (Request::is('dashboard/businesses/status/*'))
                                <div class="card-footer text-center">
                                    <a class="btn btn-warning mr-3"
                                        href="{{ url('businesses/' . $business->id . '/edit/') }}">
                                        {{ __('messages.app.editButton') }}</a>
                                    <!--
                                        {!! Form::model($business, ['method' => 'delete', 'url' => '/businesses/' . $business->id]) !!}
                                        <button class="btn btn-danger"
                                            type="submit">{{ __('messages.app.deleteButton') }}</button>
                                        {!! Form::close() !!}
                                        -->
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row" style="justify-content: center;">
                <!--{{ $businesses->links() }}-->
                {{ $businesses->appends(['year' => $year])->links() }}
            </div>
        </div>
    </section>
@endsection
