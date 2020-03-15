@extends('app')

@section('title', 'Business')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                BUSINESSES
            </h1>
        </div>
    </div>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="bottom15">Construction Company</h1>
                    <p>We aim to bring our wealth of experience to the management of any construction or re-fit programme.</p>
                    <p>This leaves our customers to continue with their core business interests unimpeded by unnecessary distractions. Virtus Contracts Limited undertake office refits / refurbishments, interior design, property construction / alteration projects and contract management.</p>
                    <p>Engaging with Virtus means that you have instant access to our broad range of Construction Management expertise over all industry and business sectors.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="image">
                        <img class="img-show" src="https://www.virtus-contracts.co.uk/wp-content/uploads/2019/12/homepage-image-1-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image">
                        <img class="img-show" src="https://www.virtus-contracts.co.uk/wp-content/uploads/2019/12/homepage-image-1-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image">
                        <img class="img-show" src="https://www.virtus-contracts.co.uk/wp-content/uploads/2019/12/homepage-image-1-1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="services bg-primary">
        <div class="container">
            <div class="section-title">
                <h2 class="text-white">Service</h2>
                <p class="col-md-8 offset-md-2 text-white">Service Description</p>
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
