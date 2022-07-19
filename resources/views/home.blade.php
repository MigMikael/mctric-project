@extends('app')

@section('title', __('messages.home.webTitle'))

@section('content')
<header id="page-top">
    <div class="overlay"></div>
    <div class="container h-100">
        <div class="d-flex h-100 text-center align-items-center">
            <div class="w-100 text-white" style="z-index: 3">
                <h1 class="header-title">{{ __('messages.home.companyTitle') }}</h1>
                <span  class="header-subtitle">{{ __('messages.home.companySubtitle') }}</span><br>
                <!--<p class="header-subtitle">Company Description</p>-->
                <button type="button" class="btn view-btn video-btn" data-toggle="modal"
                    data-src="https://www.youtube.com/embed/NlIv4u7dtQU" data-target="#myModal">
                    <i class="fas fa-play-circle fa-lg"></i> {{ __('messages.home.watchStoryButton') }}
                </button>
            </div>
        </div>
    </div>
</header>
<section class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="bottom15">{{ __('messages.home.aboutHeading') }}</h2>
                <p>{{ __('messages.home.aboutParagraphOne') }}</p>
                <p>{{ __('messages.home.aboutParagraphTwo') }}</p>
                <p>{{ __('messages.home.aboutParagraphThree') }}</p>
            </div>
            <div class="col-md-6">
                <div class="iframe-container">
                    <iframe src="https://www.youtube.com/embed/NlIv4u7dtQU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<section style="background-image: url(https://images.pexels.com/photos/310479/pexels-photo-310479.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
    background-blend-mode: overlay;
    background-size: cover;
    width: 100%; color: #FFFFFF; background-position: center center">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="vision-wrapper">
                    <h2 class="bottom15">{{ __('messages.home.philosophyHeading') }}</h2>
                    <p>{{ __('messages.home.philosophyParagraphOne') }}</p>
                </div>
            </div>
            <div class="col-md-4">
              <div class="vision-wrapper">
                    <h2 class="bottom15">{{ __('messages.home.missionHeading') }}</h2>
                    <p>{{ __('messages.home.missionOne') }} <br>
                        {{ __('messages.home.missionTwo') }} <br>
                        <!--{{ __('messages.home.missionThree') }}-->
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="vision-wrapper">
                    <h2 class="bottom15">{{ __('messages.home.policyHeading') }}</h2>
                    <p>{{ __('messages.home.policyDescription') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="services bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center section-title">{{ __('messages.home.businessHeading') }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
                <div class="service-box" onclick="location.href='{{ url('businesses/category/civil_construction') }}';"
                    style="background-image: url(https://image.freepik.com/free-photo/construction-silhouette_1127-3246.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
                    <div class="services-wrapper">
                        <h4>{{ __('messages.home.civilMenu') }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
                <div class="service-box"
                    onclick="location.href='{{ url('businesses/category/mechanical_electrical_services_plumbing_services') }}';"
                    style="background-image: url(https://image.freepik.com/free-photo/tools-equipment-plumbing-table_23-2147772310.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
                    <div class="services-wrapper">
                        <h4>{{ __('messages.home.mechanicalMenu') }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
                <div class="service-box" onclick="location.href='{{ url('businesses/category/utility_pipeline') }}';"
                    style="background-image: url(https://image.freepik.com/free-photo/air-conditioning-buildings_179755-11.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
                    <div class="services-wrapper">
                        <h4>{{ __('messages.home.utilityMenu') }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
                <div class="service-box" onclick="location.href='{{ url('businesses/category/renew_energy') }}';"
                    style="background-image: url(https://image.freepik.com/free-photo/man-worker-firld-by-solar-panels_1303-15597.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
                    <div class="services-wrapper">
                        <h4>{{ __('messages.home.renewableMenu') }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
                <div class="service-box"
                    onclick="location.href='{{ url('businesses/category/supply_chain_automation_systems') }}';"
                    style="background-image: url(https://image.freepik.com/free-photo/foreman-control-loading-containers-box-truck_28668-241.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
                    <div class="services-wrapper">
                        <h4>{{ __('messages.home.supplyMenu') }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
                <div class="service-box" onclick="location.href='{{ url('businesses/category/joint_venture_project') }}';"
                    style="background-image: url(https://images.pexels.com/photos/3740400/pexels-photo-3740400.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
                    <div class="services-wrapper">
                        <h4>{{ __('messages.home.jointVentureMenu') }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center align-items-center">
                    <button type="button" class="btn view-btn" style="margin-top: 20px !important;"
                        onclick="location.href='{{ url('/businesses') }}'">{{ __('messages.home.businessButton') }}</button>
                </div>
            </div>
        </div>
    </div>
</section>
<section style="background-image: url(https://images.pexels.com/photos/310479/pexels-photo-310479.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
    background-blend-mode: overlay;
    background-size: cover;
    width: 100%; color: #FFFFFF; background-position: center center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-white text-center section-title">{{ __('messages.home.careersHeading') }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 v-center">
                <div class="desc">
                    <h4 class="text-white" style="padding-bottom: 10px;">{{ __('messages.home.careersSubHeading') }}
                    </h4>
                    <p class="text-white">{{ __('messages.home.careersParagraphOne') }}</p>
                    <p class="text-white">{{ __('messages.home.careersParagraphTwo') }}</p>
                </div>
            </div>
            <div class="col-md-6 v-center">
                <div class="owl-job owl-carousel">
                    @foreach($careers as $career)
                    <div class="image">
                        <img class="d-block w-100" src="{{ url('image/show/'.$career->image_id) }}"
                            style="height: 300px; width: 100%; object-fit: cover;">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center align-items-center">
                    <button type="button" class="btn view-btn"
                        onclick="location.href='{{ url('/careers') }}'">{{ __('messages.home.careersButton') }}</button>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center section-title">{{ __('messages.home.clientHeading') }}</h2>
            </div>
        </div>
        <div class="client-wrapper">
            <div class="owl-general owl-carousel">
                @foreach($clients as $client)
                <div>
                    <img class="image-client" src="{{ url('image/show/'.$client->image_id) }}">
                </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center align-items-center">
                    <button type="button" class="btn view-btn" onclick="location.href='{{ url('/clients') }}'">
                        {{ __('messages.home.clientButton') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<section style="background-image: url(https://images.pexels.com/photos/310479/pexels-photo-310479.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
    background-blend-mode: overlay;
    background-size: cover;
    width: 100%; color: #FFFFFF; background-position: center center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center text-white  section-title">{{ __('messages.home.awardHeading') }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="award-wrapper text-center">
                    <div style="padding-bottom: 50px;">
                        <i class="fas fa-award fa-5x" style="color: #FFFFFF !important;"></i>
                    </div>
                    <p>{{ __('messages.home.awardDescription') }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center align-items-center">
                    <button type="button" class="btn view-btn" onclick="location.href='{{ url('/awards') }}'">
                        {{ __('messages.home.awardButton') }}</button>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center section-title">{{ __('messages.home.contactHeading') }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="map-wrapper">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.192181848043!2d100.56834121477938!3d13.76728119033743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29e88a01f5421%3A0x50acb168a55704d1!2sMcTric%20Company%20Limited!5e0!3m2!1sth!2sth!4v1569432124464!5m2!1sth!2sth"
                        width="100%" height="450px" style="border:0; margin-top: -150px;"></iframe>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="row about-map-desc-wrapper">
                    <div class="col-md-12">
                        <h5 class="contact-content-title"><i class="fas fa-map-marker-alt"></i> {{ __('messages.contact.contactAddress') }}</h5>
                        <!--<h5>{{ __('messages.contact.contactCompanyName') }}</h5>-->
                        <p>
                            {{ __('messages.contact.contactCompanyName') }} <br>
                            {{ __('messages.home.contactAddressDesc') }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <h5 class="contact-content-title"><i class="fas fa-envelope"></i> {{ __('messages.contact.contactEmail') }}</h5>
                        <p>{{ __('messages.home.contactEmailDesc') }}</p>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <h5 class="contact-content-title"><i class="fas fa-phone-square"></i> {{ __('messages.contact.contactCall') }}</h5>
                        <p>{{ __('messages.contact.contactPhone') }}: +66 (0) 2641 2100 <br>
                            {{ __('messages.contact.contactFax') }}: +66 (0) 2641 2030</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="margin-bottom: 1rem;">
                        <h5 class="contact-content-title"><i class="fas fa-money-check-alt"></i> {{ __('messages.app.chequeTrackMenu') }}</h5>
                        <!--<a href="http://203.154.157.184/Cheque_Tracking/Cheque/login.php" style="color: #000000;">Cheque Tracking Link</a>-->
                        <!--http://203.154.157.184:8888/mangoanywhere/page/authentication/vendor/login/-->
                        <a href="http://erpmctric.dyndns.org/mangoanywhere/page/authentication/vendor/login/" style="color: #000000;">Cheque Tracking Link</a>
                    </div>
                    <div class="col-sm-6 col-md-6" style="margin-bottom: 1rem;">
                        <h5 class="contact-content-title"><i class="fas fa-file-alt"></i> Internal McTRIC</h5>
                        <a href="http://mctric.dyndns.org:5010" style="color: #000000;"> Internal McTRIC Link</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <i class="fab fa-facebook fa-2x" onclick="window.location.href='https://www.facebook.com/McTRIC/'" style="cursor: pointer;"></i> &nbsp;
                        <i class="fab fa-youtube fa-2x" onclick="window.location.href=' https://www.youtube.com/channel/UCpIigCEea3WE5rdFZ99gJ4w'" style="cursor: pointer;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--
<section class="bg-white" style="padding-bottom: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact-address-wrapper">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="contact-content-title"><i class="fas fa-map-marker-alt"></i>
                                        {{ __('messages.contact.contactAddress') }}</h5>
                                    <p class="contact-content-subtitle">
                                        {{ __('messages.home.contactAddressDesc') }}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <h5 class="contact-content-title"><i class="fas fa-phone-square"></i>
                                        {{ __('messages.contact.contactCall') }}</h5>
                                    <p class="contact-content-subtitle">{{ __('messages.contact.contactPhone') }}: +66 (0) 2641 2100 <br>
                                        {{ __('messages.contact.contactFax') }}: +66 (0) 2641 2030</p>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <h5 class="contact-content-title"><i class="fas fa-envelope"></i> {{ __('messages.contact.contactEmail') }}
                                    </h5>
                                    <p class="contact-content-subtitle">{{ __('messages.home.contactEmailDesc') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-card-wrapper">
                            <div class="contact-center-wrapper">
                                <i class="fas fa-money-check-alt fa-4x"></i>
                                <p><a href="http://203.154.157.184/Cheque_Tracking/Cheque/login.php" style="color:#FFF; text-decoration: none;">{{ __('messages.app.chequeTrackMenu') }}</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-card-wrapper">
                            <div class="contact-center-wrapper">
                                <i class="fas fa-file-alt fa-4x"></i>
                                <p><a href="http://mctric.quickconnect.to/" style="color: #FFF; text-decoration: none;"> Internal McTRIC Link</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="map-wrapper">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.192181848043!2d100.56834121477938!3d13.76728119033743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29e88a01f5421%3A0x50acb168a55704d1!2sMcTric%20Company%20Limited!5e0!3m2!1sth!2sth!4v1569432124464!5m2!1sth!2sth"
                                width="100%" height="400px" style="border:0; margin-top: -150px; margin-bottom: 15px;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-card-wrapper">
                            <div class="contact-center-wrapper">
                                <i class="fab fa-facebook fa-4x" onclick="window.location.href='https://www.facebook.com/McTRIC/'"></i>
                                <p>McTRIC Facebook</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-card-wrapper">
                            <div class="contact-center-wrapper">
                                <i class="fab fa-youtube fa-4x" onclick="window.location.href=' https://www.youtube.com/channel/UCpIigCEea3WE5rdFZ99gJ4w'"></i>
                                <p>McTRIC Youtube</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->
@endsection
