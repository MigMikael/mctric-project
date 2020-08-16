<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ URL::asset('css/scrolling-nav.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <link rel="icon" sizes="16x16" href="{{url('/image/favicon.ico')}}" type="image/x-icon"/>
    <link rel="icon" sizes="32x32" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>
    <link rel="shortcut icon" sizes="32x32" type="image/ico" href="{{ URL::asset('favicon.ico') }}"/>
    <link rel="shortcut icon" sizes="398x472" type="image/png" href="{{url('/image/logo.png')}}"/>
    <link rel="shortcut icon" sizes="32x32" href="{{ URL::asset('favicon.ico') }}" type='image/x-icon' />
    <meta property="og:title" content="McTRIC Public Company Limited" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{url('/image/logo.png')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/u2m105u0299tvcdij68weonnlsw7ra9as7rkuh3a37rhykr1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top {{ (request()->is('/')) ? 'navbar' : 'navbar-main-color' }}" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">
            <img class="logo-company" src="{{url('/image/logo.png')}}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">{{ __('messages.app.aboutMenu') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/businesses') }}">{{ __('messages.app.businessMenu') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/careers') }}">{{ __('messages.app.careerMenu') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">{{ __('messages.app.contactMenu') }}</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @if(Auth::check())
                {{--User Loggin--}}
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}" href="{{ url('/dashboard/summary') }}">{{ __('messages.app.dashboardMenu') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('messages.app.logoutMenu') }}
                    </a>
                </li>
                {{--<li class="nav-item">--}}
                {{--{{ Auth::user()->name }}--}}
                {{--</li>--}}
                <form id="logout-form" action="{{ url('logout') }}" method="POST">
                    {{ csrf_field() }}
                </form>
            @endif
            <li class="nav-link lang-menu">
                <a href="{{ url('locale/en') }}" class="lang">EN</a> |
                <a href="{{ url('locale/th') }}" class="lang">TH</a>
            </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!--
<footer class="footer">
    <div class="container">
        <p class="m-0 text-center">{{ __('messages.home.copyright') }} &copy; 2019 - McTRIC Public Co.,Ltd.</p>
    </div>
</footer>
-->

<!-- Video Modal -->
<div class="modal" id="videoModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <!--
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                -->
                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always"
                            allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Business Modal -->
<div id="modal-preview" class="modal" onclick="this.style.display='none'">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <img id="img-preview" style="max-width:100%">
        </div>
    </div>
    </div>
</div>

<!-- Address Modal -->
<div class="modal fade modal-contact" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.contact.contactAddress') }}</h5>
            </div>
            <div class="modal-body">
                <div class="row about-map-desc-wrapper">
                    <div class="col-md-12">
                        <p>
                            {{ __('messages.home.contactAddressDesc') }}
                        </p>
                    </div>
                    <div class="col-md-12">
                        <div class="map-wrapper">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.192181848043!2d100.56834121477938!3d13.76728119033743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29e88a01f5421%3A0x50acb168a55704d1!2sMcTric%20Company%20Limited!5e0!3m2!1sth!2sth!4v1569432124464!5m2!1sth!2sth"
                                width="100%" height="450px" style="border:0; margin-top: -150px;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Modal -->
<div class="modal fade modal-contact" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.home.contactHeading') }}</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="contact-content-title"><i class="fas fa-envelope"></i>
                            {{ __('messages.contact.contactEmail') }}</h5>
                        <p>{{ __('messages.home.contactEmailDesc') }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="contact-content-title"><i class="fas fa-phone-square"></i>
                            {{ __('messages.contact.contactCall') }}</h5>
                        <p>{{ __('messages.contact.contactPhone') }}: +66 (0) 2641 2100 <br>
                            {{ __('messages.contact.contactFax') }}: +66 (0) 2641 2030</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="contact-content-title"><i class="fab fa-facebook"></i> Facebook</h5>
                        <p><a href="https://www.facebook.com/McTRIC/" target="_blank"
                                style="color: #212529 !important;">McTRIC Facebook Page</a></p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="contact-content-title"><i class="fab fab fa-youtube"></i> Youtube</h5>
                        <p><a href="https://www.youtube.com/channel/UCpIigCEea3WE5rdFZ99gJ4w" target="_blank"
                                style="color: #212529 !important;">McTRIC Youtube Channel</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Plugin JavaScript -->
<script src="{{ URL::asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<!-- Custom JavaScript for this theme -->
<script src="{{ URL::asset('js/scrolling-nav.js') }}"></script>
<script src="{{ URL::asset('js/owl.carousel.js') }}"></script>
<script src="{{ URL::asset('js/owl.autoplay.js') }}"></script>
<!--Fancybox-->
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<!--Custom Script-->
<script>
    $(function () {
        $(window).scroll(function () {
            //ADD CLASS
            if ($(".navbar").offset().top > 50) {
                $(".fixed-top").addClass("top-nav-collapse");
            } else {
                $(".fixed-top").removeClass("top-nav-collapse");
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        // Gets the video src from the data-src on each button
        var $videoSrc;
        $('.video-btn').click(function () {
            $videoSrc = $(this).data("src");
        });
        // when the modal is opened autoplay it
        $('#videoModal').on('shown.bs.modal', function (e) {
            // set the video src to autoplay and not to show related video.
            // Youtube related video is like a box of chocolates... you never know what you're gonna get
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
            $('.modal-backdrop').remove();
        })
        // stop playing the youtube video when I close the modal
        $('#videoModal').on('hide.bs.modal', function (e) {
            // a poor man's stop video
            $("#video").attr('src', $videoSrc);
        })
    });
</script>
<script>
    function onClick(element) {
        document.getElementById("img-preview").src = element.src;
        document.getElementById("modal-preview").style.display = "block";
}
</script>
<script>
$(document).ready(function(){

    $(".owl-general").owlCarousel({
        items: 4,
        loop: true,
        autoplay: true,
        autoPlaySpeed: 5000,
        autoPlayTimeout: 5000,
        autoplayHoverPause: true,
        responsiveClass:true,
        responsive: {
        0: {
        items: 1,
        nav:true
        },
        400: {
        items: 2,
        nav:true
        },
        600:{
        items: 2,
        nav:true
        },
        767:{
        items: 3,
        nav:true
        },
        1000:{
        items: 4,
        nav: true
        },
        }
        })

        $('.owl-job').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoPlaySpeed: 5000,
            autoPlayTimeout: 5000,
            autoplayHoverPause: true,
        })

    });

</script>
<script>
    $('[data-fancybox]').fancybox({
	protect: true
});
</script>
<script>
    tinymce.init({
    selector: 'textarea',
    height: 500,
    plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table paste imagetools wordcount"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    content_css: '//www.tiny.cloud/css/codepen.min.css',
    image_class_list: [
    {title: 'Responsive', value: 'img-responsive'}],
    });
</script>
@yield('script')
</body>
</html>
