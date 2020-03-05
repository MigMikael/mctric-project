@extends('app')

@section('title', 'McTRIC Company')

@section('content')
    <header id="page-top">
        <div class="overlay"></div>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center" style="padding-top: 60px;">
                <div class="w-100 text-white" style="z-index: 3">
                    <h1 class="header-title">McTRIC</h1><h4>Public Company Limited</h4><br>
                    <!--<p class="header-subtitle">Company Description</p>-->
                    <button type="button" class="btn view-btn video-btn" data-toggle="modal"
                            data-src="https://player.vimeo.com/video/383726515" data-target="#myModal">
                        <i class="fas fa-play-circle fa-lg"></i> Watch Our
                        Story
                    </button>
                </div>
            </div>
        </div>
    </header>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="bottom15">Construction Company</h1>
                    <p>We aim to bring our wealth of experience to the management of any construction or re-fit programme.</p>
                    <p>This leaves our customers to continue with their core business interests unimpeded by unnecessary distractions. Virtus Contracts Limited undertake office refits / refurbishments, interior design, property construction / alteration projects and contract management.</p>
                    <p>Engaging with Virtus means that you have instant access to our broad range of Construction Management expertise over all industry and business sectors.</p>
                </div>
                <div class="col-md-6">
                    <div class="image">
                        <img src="https://www.virtus-contracts.co.uk/wp-content/uploads/2019/12/homepage-image-1-1.jpg" alt="">
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
                <div class="col-md-12 text-center">
                    <h1 class="bottom15">Our Philosophy</h1>
                    <p>Our aim is to provide clients with absolute certainty in the supply of high quality interior fit-out or refurbishment projects.</p>
                    <p>To achieve this requires our wealth of experience, excellent communication skills and a truly professional approach.</p>
                </div>
            </div>
        </div>
    </section>
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
                            <h4><a href="{{ url('businesses/category/renew_energy') }}">Renewable
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
    <section class="bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                        <h1 class="text-white text-center" style="padding-bottom: 50px;">CAREERS</h1>
                </div>
            </div>
            <div class="row" style="padding-bottom: 50px;">
                <div class="col-md-6 v-center">
                    <div class="desc">
                            <h2 class="text-white" style="padding-bottom: 10px;">Why join us ?</h2>
                            <p class="text-white">Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra
                                maecenas accumsan lacus vel facilisis.</p>
                    </div>
                </div>
                <div class="col-md-6 v-center">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="https://images.pexels.com/photos/2760243/pexels-photo-2760243.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="First slide" style="height: 300px; width: 100%; object-fit: cover;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="https://images.pexels.com/photos/209719/pexels-photo-209719.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Second slide" style="height: 300px; width: 100%; object-fit: cover;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="https://images.pexels.com/photos/2422293/pexels-photo-2422293.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Third slide" style="height: 300px; width: 100%; object-fit: cover;"> 
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center align-items-center">
                        <button type="button" class="btn view-btn" onclick="location.href='{{ url('/career') }}'">See All jobs</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="padding-bottom: 50px;">
                    <h1 class="text-center">CONTACT</h1>
                </div>
                <div class="col-md-6">
                    <iframe class="resp-iframe"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.192181848043!2d100.56834121477938!3d13.76728119033743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29e88a01f5421%3A0x50acb168a55704d1!2sMcTric%20Company%20Limited!5e0!3m2!1sth!2sth!4v1569432124464!5m2!1sth!2sth"
                        width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div class="col-md-1" style="padding-bottom: 50px;"></div>
                <div class="col-md-5">
                    <h5>Address</h5>
                    <p>121/105 อาคารอาร์เอส ทาวเวอร์ ชั้น 39 <br> ถนนรัชดาภิเษก แขวงดินแดง เขตดินแดง กรุงเทพมหานคร 10400
                    </p>

                    <h5>Email Us At</h5>
                    <p>ADMIN@MCTRIC.COM</p>

                    <h5>Call Us</h5>
                    <p>Phone: +66 (0) 2641 2100 <br> Fax: +66 (0) 2641 2030</p>
                </div>
            </div>
        </div>
    </section>
     <footer class="py-5" style="background-color: #0a183d !important">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; 2019 - McTRIC Public Co.,Ltd.</p>
        </div>
    </footer>
@endsection
