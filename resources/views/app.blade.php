<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ URL::asset('css/scrolling-nav.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">
                <img class="logo-company" src="http://mctric.com/assets/img/logo.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ url('business') }}">Business</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ url('career') }}">Careers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ url('/contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="http://203.154.157.184/Cheque_Tracking/Cheque/login.php">
                            Cheque
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

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
    <script>
        $(function () {
            $(window).scroll(function () {
                //ADD CLASS
                if ($(".navbar").offset().top > 500) {
                    $(".fixed-top").addClass("top-nav-collapse");
                } else {
                    $(".fixed-top").removeClass("top-nav-collapse");
                }
            });
        });
    </script>
    <script>
        function NewTabCareer() {
            window.open("http://www.mctric.com/fromwork", "_blank");
        }
    </script>
    <script>
        $(document).ready(function () {
            // Gets the video src from the data-src on each button
            var $videoSrc;
            $('.video-btn').click(function () {
                $videoSrc = $(this).data("src");
            });
            console.log($videoSrc);
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
            // document ready
        });
    </script>
</body>
</html>
