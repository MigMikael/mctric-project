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
    <!-- Start Style CSS -->
    <link href="{{ URL::asset('css/style.css') }}?v=<?= time() ?>" rel="stylesheet">
    <!-- End Style CSS -->
    <link rel="icon" sizes="16x16" href="{{ url('/image/favicon.ico') }}" type="image/x-icon" />
    <link rel="icon" sizes="32x32" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon" />
    <link rel="shortcut icon" sizes="32x32" type="image/ico" href="{{ URL::asset('favicon.ico') }}" />
    <link rel="shortcut icon" sizes="398x472" type="image/png" href="{{ url('/image/logo.png') }}" />
    <link rel="shortcut icon" sizes="32x32" href="{{ URL::asset('favicon.ico') }}" type='image/x-icon' />
    <meta property="og:title" content="McTRIC Public Company Limited" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{ url('/image/logo.png') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/u2m105u0299tvcdij68weonnlsw7ra9as7rkuh3a37rhykr1/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
</head>

<body>
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top {{ request()->is('/') ? 'navbar' : 'navbar-main-color' }}"
        id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">
                <img class="logo-company" src="{{ url('/image/logo.png') }}">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">{{ __('messages.app.homeMenu') }}</a>
                    </li>
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
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}"
                                href="{{ url('/dashboard/summary') }}">{{ __('messages.app.dashboardMenu') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('messages.app.logoutMenu') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ url('logout') }}" method="POST">
                            {{ csrf_field() }}
                        </form>
                    @endif
                    <li class="nav-link lang-menu">
                        <a href="{{ url('locale/en') }}" class="lang"><img class="mr-2" src="{{ asset('image/en-lang.png') }}"
                            style="height: 25px;"></a>
                        <a href="{{ url('locale/th') }}" class="lang"><img src="{{ asset('image/th-lang.png') }}"
                            style="height: 25px;"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Start Content -->
    @yield('content')
    <!-- End Content -->

    <!-- Start Footer -->
    <footer class="footer" style="background: #000;">
        <div class="container">
            <div class="row" style="padding-top: 15px; padding-bottom: 35px">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="mb-2">
                        <img class="logo-company" src="{{ url('/image/logo.png') }}">
                    </div>
                    <div>
                        <p class="contact-address-container">
                            {{ __('messages.contact.contactCompanyName') }} <br>
                            {{ __('messages.home.contactAddressDesc') }}
                        </p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <div class="mt-3">
                        <h5 class="mb-2" style="font-size: 16px; font-weight: 600;">{{ __('messages.app.mainMenu') }}</h5>
                        <ul style="list-style: none; padding-left: 0px;">
                            <li style="margin-bottom: 5px;">
                                <a href="{{ url('/') }}"
                                    style="color: #FFF;">{{ __('messages.app.homeMenu') }}</a>
                            </li>
                            <li style="margin-bottom: 5px;">
                                <a href="{{ url('/about') }}"
                                    style="color: #FFF;">{{ __('messages.app.aboutMenu') }}</a>
                            </li>
                            <li style="margin-bottom: 5px;">
                                <a href="{{ url('/businesses') }}"
                                    style="color: #FFF;">{{ __('messages.app.businessMenu') }}</a>
                            </li>
                            <li style="margin-bottom: 5px;">
                                <a href="{{ url('/contact') }}"
                                    style="color: #FFF;">{{ __('messages.app.contactMenu') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <div class="mt-3">
                        <h5 class="mb-2" style="font-size: 16px; font-weight: 600;">
                            {{ __('messages.app.contactMenu') }}</h5>
                        <p style="margin-bottom: 5px;">{{ __('messages.contact.contactPhone') }}: +66 (0) 2641 2100
                        </p>
                        <p style="margin-bottom: 5px;">{{ __('messages.contact.contactFax') }}: +66 (0) 2641 2030</p>
                        <p style="margin-bottom: 5px;">Email: {{ __('messages.home.contactEmailDesc') }}</p>
                    </div>
                    <div style="padding-top: 7px;">
                        <a href="https://www.facebook.com/McTRIC/" target="_blank"><i class="fab fa-facebook mr-3"
                            style="cursor: pointer; font-size: 27px; color: #FFF;"></i></a>
                        <a href="https://www.youtube.com/channel/UCpIigCEea3WE5rdFZ99gJ4w" target="_blank"><i class="fab fa-youtube"
                            style="cursor: pointer; font-size: 27px; color: #FFF;"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center"
                        style="color: #FFF; font-size: 13px; margin-top: 15px; margin-bottom: 15px !important;">Copyright
                        © <?php echo date('Y'); ?> McTRIC Public Company Limited. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" id="video"
                            allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <!-- Bootstrap core JavaScript -->
    <script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Plugin JavaScript -->
    <script src="{{ URL::asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Jquery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Custom JavaScript for this theme -->
    <script src="{{ URL::asset('js/scrolling-nav.js') }}"></script>
    <script src="{{ URL::asset('js/owl.carousel.js') }}"></script>
    <script src="{{ URL::asset('js/owl.autoplay.js') }}"></script>
    <!--Fancybox-->
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap-multiselect.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-multiselect.css') }}" type="text/css" />
    <!--Multiple Upload File-->
    <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
    <script src="http://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script>
    <!--Custom Script-->
    <script>
        $(function() {
            $(window).scroll(function() {
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
        $(document).ready(function() {
            // Gets the video src from the data-src on each button
            var $videoSrc;
            $('.video-btn').click(function() {
                $videoSrc = $(this).data("src");
            });
            // when the modal is opened autoplay it
            $('#myModal').on('shown.bs.modal', function(e) {
                // set the video src to autoplay and not to show related video.
                // Youtube related video is like a box of chocolates... you never know what you're gonna get
                $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
                $('.modal-backdrop').remove();
            })
            // stop playing the youtube video when I close the modal
            $('#myModal').on('hide.bs.modal', function(e) {
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
        $(document).ready(function() {

            $(".owl-general").owlCarousel({
                items: 4,
                loop: true,
                autoplay: true,
                autoPlaySpeed: 5000,
                autoPlayTimeout: 5000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    400: {
                        items: 2,
                        nav: true
                    },
                    600: {
                        items: 2,
                        nav: true
                    },
                    767: {
                        items: 3,
                        nav: true
                    },
                    1000: {
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
            image_class_list: [{
                title: 'Responsive',
                value: 'img-responsive'
            }],
        });
    </script>
    @yield('script')
</body>

</html>
