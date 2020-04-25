@extends('app')

@section('title', 'Business')

@section('content')
<div class="sub-title">
    <div class="container">
        <h1 class="text-ellipsis text-center">
            {{ __('messages.dashboard.dashboardHeading') }}
        </h1>
    </div>
</div>
<section class="bg-light">
    <div class="container">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#business">{{ __('messages.dashboard.businessTab') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#career">{{ __('messages.dashboard.careerTab') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#client">{{ __('messages.dashboard.clientTab') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#award">{{ __('messages.dashboard.awardTab') }}</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane container active" id="business">
                <div style="padding-top: 3%; padding-bottom: 3%">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <h2>{{ __('messages.dashboard.businessSubHeading') }}</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ url("businesses/create") }}">{{ __('messages.app.createButton') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($businesses as $business)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <img class="card-img-top" src="{{ url('image/show/'.$business->cover_image) }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $business->name }}</h5>
                                <div class="text-center">
                                    <button type="button" class="btn learn-more-btn"
                                        onclick="location.href='{{ url('businesses/'.$business->id) }}'">
                                        {{ __('messages.dashboard.cardButton') }}
                                    </button>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                {!! Form::model($business, ['method' => 'delete', 'url' =>
                                '/businesses/'.$business->id]) !!}
                                <a href="{{ url('businesses/'. $business->id .'/edit/') }}"
                                    class="btn btn-warning">{{ __('messages.app.editButton') }}</a>
                                <button class="btn btn-danger" type="submit">{{ __('messages.app.deleteButton') }}</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row" style="justify-content: center">
                    {{ $businesses->links() }}
                </div>
            </div>
            <div class="tab-pane container fade" id="career">
                <div style="padding-top: 3%; padding-bottom: 3%">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <h2>{{ __('messages.dashboard.careerSubHeading') }}</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ url("careers/create") }}">{{ __('messages.app.createButton') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($careers as $career)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <img class="card-img-top" src="{{ url('image/show/'.$career->image_id) }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $career->name }}</h5>
                                <div class="text-center">
                                    <button type="button" class="btn learn-more-btn"
                                        onclick="location.href='{{ url('careers/'.$career->id) }}'">
                                        {{ __('messages.dashboard.cardButton') }}
                                    </button>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                {!! Form::model($career, ['method' => 'delete', 'url' => '/careers/'.$career->id]) !!}
                                <a href="{{ url('careers/'. $career->id .'/edit') }}" class="btn btn-warning">{{ __('messages.app.editButton') }}</a>
                                <button class="btn btn-danger" type="submit">{{ __('messages.app.deleteButton') }}</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane container fade" id="client">
                <div style="padding-top: 3%; padding-bottom: 3%">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <h2>{{ __('messages.dashboard.clientSubHeading') }}</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ url("clients/create") }}">{{ __('messages.app.createButton') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($clients as $client)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <img class="card-img-top" src="{{ url('image/show/'.$client->image_id) }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $client->name }}</h5>
                            </div>
                            <div class="card-footer text-center">
                                {!! Form::model($client, ['method' => 'delete', 'url' => '/clients/'.$client->id]) !!}
                                <a href="{{ url('clients/'. $client->id .'/edit') }}" class="btn btn-warning">{{ __('messages.app.editButton') }}</a>
                                <button class="btn btn-danger" type="submit">{{ __('messages.app.deleteButton') }}</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane container fade" id="award">
                <div style="padding-top: 3%; padding-bottom: 3%">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <h2>{{ __('messages.dashboard.awardSubHeading') }}</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ url("awards/create") }}">{{ __('messages.app.createButton') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($awards as $award)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <img class="card-img-top" src="{{ url('image/show/'.$award->image_id) }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $award->name }}</h5>
                                <div class="text-center">
                                    <button type="button" class="btn learn-more-btn"
                                        onclick="location.href='{{ url('awards/'.$award->id) }}'">
                                        {{ __('messages.dashboard.cardButton') }}
                                    </button>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                {!! Form::model($award, ['method' => 'delete', 'url' => '/awards/'.$award->id]) !!}
                                <a href="{{ url('awards/'. $award->id .'/edit') }}" class="btn btn-warning">{{ __('messages.app.editButton') }}</a>
                                <button class="btn btn-danger" type="submit">{{ __('messages.app.deleteButton') }}</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
