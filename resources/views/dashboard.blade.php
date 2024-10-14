@extends('app')

@section('title', __('messages.home.webTitle'))

@section('content')
    <header class="sub-title">
        <div class="sub-title-overlay"></div>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
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
            <!-- Start Nav Tabs -->
            <ul class="nav nav-tabs nav-justified">
                <li class="nav-item">
                    <a class="nav-link @if ($activeTab == 'summary') active @endif"
                        href="{{ url('/dashboard/summary') }}">{{ __('messages.dashboard.summaryTab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if ($activeTab == 'businesses') active @endif"
                        href="{{ url('/dashboard/businesses') }}">{{ __('messages.dashboard.businessTab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if ($activeTab == 'careers') active @endif"
                        href="{{ url('/dashboard/careers') }}">{{ __('messages.dashboard.careerTab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if ($activeTab == 'clients') active @endif"
                        href="{{ url('/dashboard/clients') }}">{{ __('messages.dashboard.clientTab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if ($activeTab == 'awards') active @endif"
                        href="{{ url('/dashboard/awards') }}">{{ __('messages.dashboard.awardTab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if ($activeTab == 'users') active @endif"
                        href="{{ url('/dashboard/users') }}">{{ __('messages.dashboard.userTab') }}</a>
                </li>
            </ul>
            <!-- End Nav Tabs -->

            <!-- Start Tab panels -->
            <div class="tab-content tab-content-dashboard">
                <!-- Start Summary Tab -->
                <div class="tab-pane container @if ($activeTab == 'summary') active @endif" id="summary">
                    <div style="padding-top: 3%; padding-bottom: 3%">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <h2>{{ __('messages.dashboard.summarySubHeading') }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row services">
                        <div class="col-md-6" data-aos="fade-up"
                            onclick="location.href='{{ url('/dashboard/businesses/status/work_in_process') }}';">
                            <div class="service-box"
                                onclick="location.href='{{ url('businesses/category/civil_construction') }}';"
                                style="background-image: url(https://images.pexels.com/photos/2138126/pexels-photo-2138126.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
                                <div class="services-wrapper">
                                    <h5>{{ __('messages.status.workInProgress') }}<br>
                                        @if ($inProgressCount)
                                            ({{ $inProgressCount }} {{ __('messages.business.project') }})
                                        @else
                                            ({{ 0 }} {{ __('messages.business.project') }})
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up"
                            onclick="location.href='{{ url('/dashboard/businesses/status/complete') }}';">
                            <div class="service-box"
                                onclick="location.href='{{ url('businesses/category/civil_construction') }}';"
                                style="background-image: url(https://images.pexels.com/photos/1481105/pexels-photo-1481105.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
                                <div class="services-wrapper">
                                    <h5>{{ __('messages.status.complete') }}<br>
                                        @if ($completeCount)
                                            ({{ $completeCount }} {{ __('messages.business.project') }})
                                        @else
                                            ({{ 0 }} {{ __('messages.business.project') }})
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Summary Tab -->

                <!-- Start Business Tab -->
                <div class="tab-pane container @if ($activeTab == 'businesses') active @endif" id="business">
                    <div style="padding-top: 3%; padding-bottom: 3%">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <h2>{{ __('messages.dashboard.businessSubHeading') }}</h2>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-primary btn-create-dashboard"
                                        href="{{ url('businesses/create') }}">{{ __('messages.app.createButton') }}</a>
                                    <!--
                                            <a class="btn btn-primary"
                                                href="{{ url('businesses/sort') }}">{{ __('messages.dashboard.sortButton') }}</a>
                                            -->
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row" style="padding-top: 15px;">
                            <div class="col-md-12">
                                {!! Form::open(['method' => 'post', 'url' => '/businesses/search', 'class' => '']) !!}
                                <div class="row">
                                    <div class="col-md-9 col-lg-10 form-group">
                                        @if ($search)
                                            {!! Form::text('query', $search, [
                                                'class' => 'form-control filter-search-wrapper',
                                                'placeholder' => 'Search by name',
                                            ]) !!}
                                        @else
                                            {!! Form::text('query', null, [
                                                'class' => 'form-control filter-search-wrapper',
                                                'placeholder' => 'Search by name',
                                            ]) !!}
                                        @endif
                                    </div>
                                    <div class="col-md-3 col-lg-2 form-group">
                                        <button class="btn btn-outline-primary btn-block"
                                            type="submit">{{ __('messages.app.searchButton') }}</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        @foreach ($businesses as $business)
                            <div class="col-sm-6 col-lg-4">
                                <div class="card" style="cursor: unset;">
                                    <img class="card-img-top" src="{{ url('image/show/' . $business->cover_image) }}"
                                        alt="Card image cap">
                                    <div class="card-body" style="height: 180px;">
                                        <h5 class="card-title text-center">
                                            {{ $business->name }}
                                        </h5>
                                        <div class="text-center form-group">
                                            @if ($business->display)
                                                <span
                                                    class="badge badge-success text-center">{{ __('messages.dashboard.showButton') }}</span>
                                            @else
                                                <span
                                                    class="badge badge-danger text-center">{{ __('messages.dashboard.hideButton') }}</span>
                                            @endif
                                        </div>
                                        <div class="text-center">
                                            <button type="button" class="btn learn-more-btn"
                                                onclick="location.href='{{ url('businesses/' . $business->id) }}'">
                                                {{ __('messages.dashboard.cardButton') }}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        {!! Form::model($business, ['method' => 'delete', 'url' => '/businesses/' . $business->id, 'onsubmit' => 'return confirmDelete()']) !!}
                                        <a class="btn btn-warning mr-3"
                                            href="{{ url('businesses/' . $business->id . '/edit/') }}">
                                            {{ __('messages.app.editButton') }}</a>
                                        <button class="btn btn-danger"
                                            type="submit">{{ __('messages.app.deleteButton') }}</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($businesses != [])
                        <div class="row" style="justify-content: center; padding-top: 15px;">
                            {{ $businesses->links() }}
                        </div>
                    @endif
                </div>
                <!-- End Business Tab -->

                <!-- Start Career Tab -->
                <div class="tab-pane container @if ($activeTab == 'careers') active @endif" id="career">
                    <div style="padding-top: 3%; padding-bottom: 3%">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <h2>{{ __('messages.dashboard.careerSubHeading') }}</h2>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-primary btn-create-dashboard"
                                        href="{{ url('careers/create') }}">{{ __('messages.app.createButton') }}</a>
                                    <!--
                                            <a class="btn btn-primary"
                                                href="{{ url('careers/sort') }}">{{ __('messages.dashboard.sortButton') }}</a>
                                            -->
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row" style="padding-top: 15px;">
                            <div class="col-md-12">
                                {!! Form::open(['method' => 'post', 'url' => '/careers/search', 'class' => '']) !!}
                                <div class="row">
                                    <div class="col-md-9 col-lg-10 form-group">
                                        @if ($search)
                                            {!! Form::text('query', $search, [
                                                'class' => 'form-control filter-search-wrapper',
                                                'placeholder' => 'Search by name',
                                            ]) !!}
                                        @else
                                            {!! Form::text('query', null, [
                                                'class' => 'form-control filter-search-wrapper',
                                                'placeholder' => 'Search by name',
                                            ]) !!}
                                        @endif
                                    </div>
                                    <div class="col-md-3 col-lg-2 form-group">
                                        <button class="btn btn-outline-primary btn-block"
                                            type="submit">{{ __('messages.app.searchButton') }}</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        @foreach ($careers as $career)
                            <div class="col-sm-6 col-lg-4">
                                <div class="card" style="cursor: unset;">
                                    <img class="card-img-top" src="{{ url('image/show/' . $career->image_id) }}"
                                        alt="Card image cap">
                                    <div class="card-body" style="height: 180px;">
                                        <h5 class="card-title text-center">
                                            {{ $career->name }}
                                        </h5>
                                        <div class="text-center form-group">
                                            @if ($career->display)
                                                <span
                                                    class="badge badge-success text-center">{{ __('messages.dashboard.showButton') }}</span>
                                            @else
                                                <span
                                                    class="badge badge-danger text-center">{{ __('messages.dashboard.hideButton') }}</span>
                                            @endif
                                        </div>
                                        <div class="text-center">
                                            <button type="button" class="btn learn-more-btn"
                                                onclick="location.href='{{ url('careers/' . $career->id) }}'">
                                                {{ __('messages.dashboard.cardButton') }}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        {!! Form::model($career, ['method' => 'delete', 'url' => '/careers/' . $career->id, 'onsubmit' => 'return confirmDelete()']) !!}
                                        <a class="btn btn-warning mr-3"
                                            href="{{ url('careers/' . $career->id . '/edit') }}">{{ __('messages.app.editButton') }}</a>
                                        <button class="btn btn-danger"
                                            type="submit">{{ __('messages.app.deleteButton') }}</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($careers != [])
                        <div class="row" style="justify-content: center; padding-top: 15px;">
                            {{ $careers->links() }}
                        </div>
                    @endif
                </div>
                <!-- End Career Tab -->

                <!-- Start Client Tab -->
                <div class="tab-pane container @if ($activeTab == 'clients') active @endif" id="client">
                    <div style="padding-top: 3%; padding-bottom: 3%">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <h2>{{ __('messages.dashboard.clientSubHeading') }}</h2>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-primary btn-create-dashboard"
                                        href="{{ url('clients/create') }}">{{ __('messages.app.createButton') }}</a>
                                    <!--
                                            <a class="btn btn-primary"
                                                href="{{ url('clients/sort') }}">{{ __('messages.dashboard.sortButton') }}</a>
                                            -->
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row" style="padding-top: 15px;">
                            <div class="col-md-12">
                                {!! Form::open(['method' => 'post', 'url' => '/clients/search', 'class' => '']) !!}
                                <div class="row">
                                    <div class="col-md-9 col-lg-10 form-group">
                                        @if ($search)
                                            {!! Form::text('query', $search, [
                                                'class' => 'form-control filter-search-wrapper',
                                                'placeholder' => 'Search by name',
                                            ]) !!}
                                        @else
                                            {!! Form::text('query', null, [
                                                'class' => 'form-control filter-search-wrapper',
                                                'placeholder' => 'Search by name',
                                            ]) !!}
                                        @endif
                                    </div>
                                    <div class="col-md-3 col-lg-2 form-group">
                                        <button class="btn btn-outline-primary btn-block"
                                            type="submit">{{ __('messages.app.searchButton') }}</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        @foreach ($clients as $client)
                            <div class="col-sm-6 col-lg-4">
                                <div class="card" style="cursor: unset;">
                                    <img class="card-img-top" src="{{ url('image/show/' . $client->image_id) }}"
                                        alt="Card image cap" style="object-fit: contain !important;">
                                    <div class="card-body" style="height: 120px;">
                                        <h5 class="card-title text-center">
                                            {{ $client->name }}
                                        </h5>
                                        <div class="text-center">
                                            @if ($client->display)
                                                <span
                                                    class="badge badge-success text-center">{{ __('messages.dashboard.showButton') }}</span>
                                            @else
                                                <span
                                                    class="badge badge-danger text-center">{{ __('messages.dashboard.hideButton') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        {!! Form::model($client, ['method' => 'delete', 'url' => '/clients/' . $client->id, 'onsubmit' => 'return confirmDelete()']) !!}
                                        <a class="btn btn-warning mr-3"
                                            href="{{ url('clients/' . $client->id . '/edit') }}">{{ __('messages.app.editButton') }}</a>
                                        <button class="btn btn-danger"
                                            type="submit">{{ __('messages.app.deleteButton') }}</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($clients != [])
                        <div class="row" style="justify-content: center; padding-top: 15px;">
                            {{ $clients->links() }}
                        </div>
                    @endif
                </div>
                <!-- End Client Tab -->

                <!-- Start Award Tab -->
                <div class="tab-pane container @if ($activeTab == 'awards') active @endif" id="award">
                    <div style="padding-top: 3%; padding-bottom: 3%">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <h2>{{ __('messages.dashboard.awardSubHeading') }}</h2>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-primary btn-create-dashboard"
                                        href="{{ url('awards/create') }}">{{ __('messages.app.createButton') }}</a>
                                    <!--
                                        <a class="btn btn-primary"
                                            href="{{ url('awards/sort') }}">{{ __('messages.dashboard.sortButton') }}</a>
                                        -->
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row" style="padding-top: 15px;">
                            <div class="col-md-12">
                                {!! Form::open(['method' => 'post', 'url' => '/awards/search', 'class' => '']) !!}
                                <div class="row">
                                    <div class="col-md-9 col-lg-10 form-group">
                                        @if ($search)
                                            {!! Form::text('query', $search, [
                                                'class' => 'form-control filter-search-wrapper',
                                                'placeholder' => 'Search by name',
                                            ]) !!}
                                        @else
                                            {!! Form::text('query', null, [
                                                'class' => 'form-control filter-search-wrapper',
                                                'placeholder' => 'Search by name',
                                            ]) !!}
                                        @endif
                                    </div>
                                    <div class="col-md-3 col-lg-2 form-group">
                                        <button class="btn btn-outline-primary btn-block"
                                            type="submit">{{ __('messages.app.searchButton') }}</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        @foreach ($awards as $award)
                            <div class="col-sm-6 col-lg-4">
                                <div class="card" style="cursor: unset !important;">
                                    <img class="card-img-top" src="{{ url('image/show/' . $award->image_id) }}"
                                        alt="Card image cap" style="object-fit: contain !important;">
                                    <div class="card-body" style="height: 180px;">
                                        <h5 class="card-title text-center">
                                            {{ $award->name }}
                                        </h5>
                                        <div class="text-center form-group">
                                            @if ($award->display)
                                                <span
                                                    class="badge badge-success text-center">{{ __('messages.dashboard.showButton') }}</span>
                                            @else
                                                <span
                                                    class="badge badge-danger text-center">{{ __('messages.dashboard.hideButton') }}</span>
                                            @endif
                                        </div>
                                        <div class="text-center">
                                            <button type="button" class="btn learn-more-btn"
                                                onclick="location.href='{{ url('awards/' . $award->id) }}'">
                                                {{ __('messages.dashboard.cardButton') }}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        {!! Form::model($award, ['method' => 'delete', 'url' => '/awards/' . $award->id, 'onsubmit' => 'return confirmDelete()']) !!}
                                        <a class="btn btn-warning mr-3"
                                            href="{{ url('awards/' . $award->id . '/edit') }}">{{ __('messages.app.editButton') }}</a>
                                        <button class="btn btn-danger"
                                            type="submit">{{ __('messages.app.deleteButton') }}</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($awards != [])
                        <div class="row" style="justify-content: center; padding-top: 15px;">
                            {{ $awards->links() }}
                        </div>
                    @endif
                </div>
                <!-- End Award Tab -->

                <!-- Start User Tab -->
                <div class="tab-pane container @if ($activeTab == 'users') active @endif" id="user">
                    <div style="padding-top: 3%; padding-bottom: 3%">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <h2>{{ __('messages.dashboard.userSubHeading') }}</h2>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-primary btn-create-dashboard"
                                        href="{{ url('/users/create') }}">{{ __('messages.app.createButton') }}</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row" style="padding-top: 15px;">
                            <div class="col-md-12">
                                {!! Form::open(['method' => 'post', 'url' => '/users/search', 'class' => '']) !!}
                                <div class="row">
                                    <div class="col-md-9 col-lg-10 form-group">
                                        @if ($search)
                                            {!! Form::text('query', $search, [
                                                'class' => 'form-control filter-search-wrapper',
                                                'placeholder' => 'Search by name, email',
                                            ]) !!}
                                        @else
                                            {!! Form::text('query', null, [
                                                'class' => 'form-control filter-search-wrapper',
                                                'placeholder' => 'Search by name, email',
                                            ]) !!}
                                        @endif
                                    </div>
                                    <div class="col-md-3 col-lg-2 form-group">
                                        <button class="btn btn-outline-primary btn-block"
                                            type="submit">{{ __('messages.app.searchButton') }}</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        @foreach ($users as $user)
                            <div class="col-sm-6 col-lg-4">
                                <div class="card" style="cursor: unset !important;">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">{{ $user->name }}</h5>
                                        <hr>
                                        <h6 class="card-title text-center">{{ $user->email }}</h6>
                                    </div>
                                    <div class="card-footer text-center">
                                        {!! Form::model($user, ['method' => 'delete', 'url' => '/users/' . $user->id, 'onsubmit' => 'return confirmDelete()']) !!}
                                        <a class="btn btn-warning mr-3"
                                            href="{{ url('users/' . $user->id . '/edit') }}">{{ __('messages.app.editButton') }}</a>
                                        @if ($user->email != 'admin@gmail.com')
                                            <button class="btn btn-danger"
                                                type="submit">{{ __('messages.app.deleteButton') }}</button>
                                        @endif
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- End User Tab -->
            </div>
            <!-- End Tab Content -->
        </div>
    </section>
@endsection

<script>
    function confirmDelete() {
        return confirm("คุณแน่ใจว่าต้องการลบรายการดังกล่าว หากลบแล้วจะไม่สามารถกู้คืนข้อมูลได้ ?");
    }
</script>
