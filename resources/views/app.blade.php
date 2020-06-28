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
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('about')) ? 'active' : '' }}" href="{{ url('/about') }}">{{ __('messages.app.aboutMenu') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('businesses*')) ? 'active' : '' }}" href="{{ url('/businesses') }}">{{ __('messages.app.businessMenu') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('careers*')) ? 'active' : '' }}" href="{{ url('/careers') }}">{{ __('messages.app.careerMenu') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('contact')) ? 'active' : '' }}" href="{{ url('/contact') }}">{{ __('messages.app.contactMenu') }}</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @if(Auth::check())
                {{--User Loggin--}}
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}" href="{{ url('/dashboard/businesses') }}">{{ __('messages.app.dashboardMenu') }}</a>
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
                <a href="{{ url('locale/th') }}" class="lang">ไทย</a>
            </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer class="footer">
    <div class="container">
        <p class="m-0 text-center">{{ __('messages.home.copyright') }} &copy; 2019 - McTRIC Public Co.,Ltd.</p>
    </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always"
                            allow="autoplay"></iframe>
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
<script>
    $(function () {
        $(window).scroll(function () {
            //ADD CLASS
            if ($(".navbar").offset().top > 250) {
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
        $('#myModal').on('shown.bs.modal', function (e) {
            // set the video src to autoplay and not to show related video.
            // Youtube related video is like a box of chocolates... you never know what you're gonna get
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })
        // stop playing the youtube video when I close the modal
        $('#myModal').on('hide.bs.modal', function (e) {
            // a poor man's stop video
            $("#video").attr('src', $videoSrc);
        })
    });
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
                items: 2,
                nav:true
                },
                400: {
                items: 2,
                nav:false
                },
                600:{
                    items: 3,
                    nav:false
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
