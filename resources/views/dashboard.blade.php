@extends('app')

@section('title', 'Business')

@section('content')
<header class="sub-title">
    <div class="sub-title-overlay"></div>
    <div class="container h-100">
        <div class="d-flex h-100 text-center align-items-center" style="padding-top: 60px;">
            <div class="w-100 text-white" style="z-index: 3">
                <h1 class="text-ellipsis text-center">
                    {{ __('messages.dashboard.dashboardHeading') }}
                </h1>
            </div>
        </div>
    </div>
</header>
<section class="bg-light">
    <div class="container">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link @if($activeTab == 'businesses') active @endif"
                    href="{{ url("/dashboard/businesses") }}">{{ __('messages.dashboard.businessTab') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($activeTab == 'careers') active @endif"
                    href="{{ url("/dashboard/careers") }}">{{ __('messages.dashboard.careerTab') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($activeTab == 'clients') active @endif"
                    href="{{ url("/dashboard/clients") }}">{{ __('messages.dashboard.clientTab') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($activeTab == 'awards') active @endif"
                    href="{{ url("/dashboard/awards") }}">{{ __('messages.dashboard.awardTab') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($activeTab == 'users') active @endif"
                    href="{{ url("/dashboard/users") }}">{{ __('messages.dashboard.userTab') }}</a>
            </li>
        </ul>

        <!-- Tab panels -->
        <div class="tab-content">
            <div class="tab-pane container @if($activeTab == 'businesses') active @endif" id="business">
                <div style="padding-top: 3%; padding-bottom: 3%">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <h2>{{ __('messages.dashboard.businessSubHeading') }}</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary"
                                    href="{{ url("businesses/create") }}">{{ __('messages.app.createButton') }}</a>
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
                                <button class="btn btn-danger"
                                    type="submit">{{ __('messages.app.deleteButton') }}</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @if($businesses != [])
                <div class="row" style="justify-content: center">
                    {{ $businesses->links() }}
                </div>
                @endif
            </div>
            <div class="tab-pane container @if($activeTab == 'careers') active @endif" id="career">
                <div style="padding-top: 3%; padding-bottom: 3%">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <h2>{{ __('messages.dashboard.careerSubHeading') }}</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary"
                                    href="{{ url("careers/create") }}">{{ __('messages.app.createButton') }}</a>
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
                                <a href="{{ url('careers/'. $career->id .'/edit') }}"
                                    class="btn btn-warning">{{ __('messages.app.editButton') }}</a>
                                <button class="btn btn-danger"
                                    type="submit">{{ __('messages.app.deleteButton') }}</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @if($careers != [])
                <div class="row" style="justify-content: center">
                    {{ $careers->links() }}
                </div>
                @endif
            </div>
            <div class="tab-pane container @if($activeTab == 'clients') active @endif" id="client">
                <div style="padding-top: 3%; padding-bottom: 3%">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <h2>{{ __('messages.dashboard.clientSubHeading') }}</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary"
                                    href="{{ url("clients/create") }}">{{ __('messages.app.createButton') }}</a>
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
                                <a href="{{ url('clients/'. $client->id .'/edit') }}"
                                    class="btn btn-warning">{{ __('messages.app.editButton') }}</a>
                                <button class="btn btn-danger"
                                    type="submit">{{ __('messages.app.deleteButton') }}</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                @if($clients != [])
                <div class="row" style="justify-content: center">
                    {{ $clients->links() }}
                </div>
                @endif
            </div>
            <div class="tab-pane container @if($activeTab == 'awards') active @endif" id="award">
                <div style="padding-top: 3%; padding-bottom: 3%">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <h2>{{ __('messages.dashboard.awardSubHeading') }}</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary"
                                    href="{{ url("awards/create") }}">{{ __('messages.app.createButton') }}</a>
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
                            <div class="card-body" style="min-height: 150px !important;">
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
                                <a href="{{ url('awards/'. $award->id .'/edit') }}"
                                    class="btn btn-warning">{{ __('messages.app.editButton') }}</a>
                                <button class="btn btn-danger"
                                    type="submit">{{ __('messages.app.deleteButton') }}</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                @if($awards != [])
                <div class="row" style="justify-content: center">
                    {{ $awards->links() }}
                </div>
                @endif
            </div>
            <div class="tab-pane container @if($activeTab == 'users') active @endif" id="user">
                <div style="padding-top: 3%; padding-bottom: 3%">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <h2>{{ __('messages.dashboard.userSubHeading') }}</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary"
                                    href="{{ url("/users/create") }}">{{ __('messages.app.createButton') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($users as $user)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $user->name }}</h5>
                                <hr>
                                <h6 class="card-title text-center">{{ $user->email }}</h6>
                            </div>
                            <div class="card-footer text-center">
                                {!! Form::model($user, ['method' => 'delete', 'url' => '/users/'.$user->id]) !!}
                                <a href="{{ url('users/'. $user->id .'/edit') }}"
                                    class="btn btn-warning">{{ __('messages.app.editButton') }}</a>
                                <button class="btn btn-danger"
                                    type="submit">{{ __('messages.app.deleteButton') }}</button>
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