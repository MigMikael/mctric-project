@extends('app')

@section('title', 'Business')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                Business
            </h1>
            <a href="{{ url('businesses/create') }}" class="btn btn-primary">Create</a>
        </div>
    </div>
    <section class="services">
        <div class="container">
            <div class="section-title">
                <h2>บริการของเรา</h2>
                <p class="col-md-8 offset-md-2">คำอธิบาย</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="service-box" style="background-image: url(https://image.freepik.com/free-photo/construction-silhouette_1127-3246.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
                 background-blend-mode: overlay;
                 background-position: center; background-size: cover;">
                        <div class="services-wrapper">
                            <h4><a href="{{ url('businesses/category/civil_construction') }}">Civil & Construction</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="service-box" style="background-image: url(https://image.freepik.com/free-photo/tools-equipment-plumbing-table_23-2147772310.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
                 background-blend-mode: overlay; background-position: center; background-size: cover;">
                        <div class="services-wrapper">
                            <h4>
                                <a href="{{ url('businesses/category/mechanical_electrical_services_plumbing_services') }}">Mechanical,
                                    Electrical and Plumbing services (MEP)</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="service-box" style="background-image: url(https://image.freepik.com/free-photo/air-conditioning-buildings_179755-11.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
                 background-blend-mode: overlay;
                 background-position: center; background-size: cover;">
                        <div class="services-wrapper">
                            <h4><a href="{{ url('businesses/category/utility_pipeline') }}">Utility Pipeline</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="service-box" style="background-image: url(https://image.freepik.com/free-photo/man-worker-firld-by-solar-panels_1303-15597.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
                 background-blend-mode: overlay;
                 background-position: center; background-size: cover;">
                        <div class="services-wrapper">
                            <h4 style="text-white"><a href="{{ url('businesses/category/renew_energy') }}">Renewable
                                    Energy</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="service-box" style="background-image: url(https://image.freepik.com/free-photo/foreman-control-loading-containers-box-truck_28668-241.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
                 background-blend-mode: overlay;
                 background-position: center; background-size: cover;">
                        <div class="services-wrapper">
                            <h4><a href="{{ url('businesses/category/supply_chain_automation_systems') }}">Supply Chain
                                    Automation Systems</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
        </div>
    </section>
@endsection
