@extends('app')

@section('title', __('messages.home.webTitle'))

@section('content')
<header class="sub-title">
    <div class="sub-title-overlay"></div>
    <div class="container h-100">
        <div class="d-flex h-100 text-center align-items-center">
            <div class="w-100 text-white" style="z-index: 3">
                <h1 class="text-ellipsis text-center">
                    {{ __('messages.app.contactMenu') }}
                </h1>
            </div>
        </div>
    </div>
</header>
<section class="bg-white">
    <div class="container">
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
                        <a href="#" style="color: #000000;">Cheque Tracking Link</a>
                    </div>
                    <div class="col-sm-6 col-md-6" style="margin-bottom: 1rem;">
                        <h5 class="contact-content-title"><i class="fas fa-file-alt"></i> Internal McTRIC</h5>
                        <a href="http://mctric.quickconnect.to/" style="color: #000000;"> Internal McTRIC Link</a>
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
<!--<section class="bg-white" style="padding-bottom: 50px;">
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
</section>-->
@endsection