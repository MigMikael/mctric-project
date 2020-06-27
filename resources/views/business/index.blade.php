@extends('app')

@section('title', 'Business')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                {{ __('messages.business.businessHeading') }}
            </h1>
        </div>
    </div>
    <section class="services bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="service-box" onclick="location.href='{{ url('businesses/category/civil_construction') }}';" style="background-image: url(https://image.freepik.com/free-photo/construction-silhouette_1127-3246.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
                        <div class="services-wrapper">
                            <h4>{{ __('messages.home.civilMenu') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="service-box" onclick="location.href='{{ url('businesses/category/mechanical_electrical_services_plumbing_services') }}';" style="background-image: url(https://image.freepik.com/free-photo/tools-equipment-plumbing-table_23-2147772310.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
                        <div class="services-wrapper">
                            <h4>{{ __('messages.home.mechanicalMenu') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="service-box" onclick="location.href='{{ url('businesses/category/utility_pipeline') }}';" style="background-image: url(https://image.freepik.com/free-photo/air-conditioning-buildings_179755-11.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
                        <div class="services-wrapper">
                            <h4>{{ __('messages.home.utilityMenu') }}</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="service-box" onclick="location.href='{{ url('businesses/category/renew_energy') }}';" style="background-image: url(https://image.freepik.com/free-photo/man-worker-firld-by-solar-panels_1303-15597.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
                        <div class="services-wrapper">
                            <h4>{{ __('messages.home.renewableMenu') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="service-box" onclick="location.href='{{ url('businesses/category/supply_chain_automation_systems') }}';" style="background-image: url(https://image.freepik.com/free-photo/foreman-control-loading-containers-box-truck_28668-241.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
                        <div class="services-wrapper">
                            <h4>{{ __('messages.home.supplyMenu') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="service-box" style="background-image: url(https://image.freepik.com/free-photo/foreman-control-loading-containers-box-truck_28668-241.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
                 background-blend-mode: overlay;
                 background-position: center; background-size: cover;">
                        <div class="services-wrapper">
                            <h4><a href="{{ url('businesses/category/co_project') }}">{{ __('messages.business.coProjectMenu') }}</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
