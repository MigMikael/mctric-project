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
<!--
<section class="bg-white">
    <div class="container" style="max-width: 800px">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <i class="fas fa-map-marked-alt fa-3x"></i>
                                </div>
                                <div class="flip-card-back">
                                    <button class="btn btn-primary" type="button" data-toggle="modal"
                                        data-target="#addressModal">View</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <i class="fas fa-phone-square fa-3x"></i>
                                </div>
                                <div class="flip-card-back">
                                    <button class="btn btn-primary" type="button" data-toggle="modal"
                                        data-target="#contactModal">View</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <i class="fas fa-money-check-alt fa-3x"></i>
                                </div>
                                <div class="flip-card-back">
                                    <button class="btn btn-primary" type="button" onclick="window.location.href='http://203.154.157.184/Cheque_Tracking/Cheque/login.php'">View</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <i class="fas fa-file-alt fa-3x"></i>
                                </div>
                                <div class="flip-card-back">
                                    <button class="btn btn-primary" type="button" onclick="window.location.href='http://mctric.quickconnect.to/'">View</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->
<section class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="map-wrapper">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.192181848043!2d100.56834121477938!3d13.76728119033743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29e88a01f5421%3A0x50acb168a55704d1!2sMcTric%20Company%20Limited!5e0!3m2!1sth!2sth!4v1569432124464!5m2!1sth!2sth"
                        width="100%" height="450px" style="border:0; margin-top: -150px;"></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row about-map-desc-wrapper">
                    <div class="col-md-12">
                        <h5 class="contact-content-title"><i class="fas fa-map-marker-alt"></i> {{ __('messages.contact.contactAddress') }}</h5>
                        <p>
                            {{ __('messages.home.contactAddressDesc') }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="contact-content-title"><i class="fas fa-envelope"></i> {{ __('messages.contact.contactEmail') }}</h5>
                        <p>{{ __('messages.home.contactEmailDesc') }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="contact-content-title"><i class="fas fa-phone-square"></i> {{ __('messages.contact.contactCall') }}</h5>
                        <p>{{ __('messages.contact.contactPhone') }}: +66 (0) 2641 2100 <br>
                            {{ __('messages.contact.contactFax') }}: +66 (0) 2641 2030</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" style="margin-bottom: 1rem;">
                        <h5 class="contact-content-title"><i class="fas fa-money-check-alt"></i> {{ __('messages.app.chequeTrackMenu') }}</h5>
                        <a href="http://203.154.157.184/Cheque_Tracking/Cheque/login.php" style="color: #000000;">Cheque Tracking Link</a>
                    </div>
                    <div class="col-md-6" style="margin-bottom: 1rem;">
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
@endsection