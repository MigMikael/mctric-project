@extends('app')

@section('title', 'McTRIC Company')

@section('content')
<header id="page-top">
    <div class="overlay"></div>
    <div class="container h-100">
        <div class="d-flex h-100 text-center align-items-center" style="padding-top: 60px;">
            <div class="w-100 text-white" style="z-index: 3">
                <h1 class="header-title">{{ __('messages.home.companyTitle') }}</h1>
                <h4>{{ __('messages.home.companySubtitle') }}</h4><br>
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
                <h1 class="bottom15">{{ __('messages.home.aboutHeading') }}</h1>
                <p>{{ __('messages.home.aboutParagraphOne') }}</p>
                <p>{{ __('messages.home.aboutParagraphTwo') }}</p>
                <p>{{ __('messages.home.aboutParagraphThree') }}</p>
            </div>
            <div class="col-md-6">
                <div class="image">
                    <img src="https://www.virtus-contracts.co.uk/wp-content/uploads/2019/12/homepage-image-1-1.jpg"
                        alt="">
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
                <h1 class="bottom15">{{ __('messages.home.philosophyHeading') }}</h1>
                <p>{{ __('messages.home.philosophyParagraphOne') }}</p>
                <p>{{ __('messages.home.philosophyParagraphTwo') }}</p>
            </div>
        </div>
    </div>
</section>
<section class="services bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center section-title">{{ __('messages.home.businessHeading') }}</h1>
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
                        <h4>{{ __('messages.home.utilityMenu') }}</a></h4>
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
                <div class="service-box" onclick="location.href='{{ url('businesses/category/co_project') }}';"
                    style="background-image: url(https://images.pexels.com/photos/3740400/pexels-photo-3740400.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
                    <div class="services-wrapper">
                        <h4>{{ __('messages.business.coProjectMenu') }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center align-items-center">
                    <button type="button" class="btn view-btn" style="margin-top: 20px !important;"
                        onclick="location.href='{{ url('/businesses') }}'">See All Business</button>
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
                <h1 class="text-white text-center section-title">{{ __('messages.home.careersHeading') }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 v-center">
                <div class="desc">
                    <h2 class="text-white" style="padding-bottom: 10px;">{{ __('messages.home.careersSubHeading') }}
                    </h2>
                    <p class="text-white">{{ __('messages.home.careersParagraphOne') }}</p>
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
                <h1 class="text-center section-title">{{ __('messages.home.clientHeading') }}</h1>
            </div>
        </div>
        <div class="client-wrapper">
            <div class="owl-general owl-carousel">
                @foreach($clients as $client)
                <div class="image">
                    <img class="image-client" src="{{ url('image/show/'.$client->image_id) }}">
                </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center align-items-center">
                    <button type="button" class="btn view-btn" onclick="location.href='{{ url('/clients') }}'">See All
                        Client</button>
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
                <h1 class="text-center text-white  section-title">{{ __('messages.home.awardHeading') }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="award-wrapper text-center">
                    <img src="{{url('/image/award.png')}}">
                    <p>เยลลี่ซิม มอคค่าแมชีนเวิร์กโบรกเกอร์การันตี พาวเวอร์ ราชบัณฑิตยสถาน แพ็คออร์เดอร์อีโรติกสเตชั่น
                        ไลฟ์โฮมหลวงตาแทงกั๊ก สะกอมเจ็ตแจ๊ส แอปเปิ้ลไนน์เจ็ตนาฏยศาลา มายาคติคอนโทรลคำตอบ เซ็นเซอร์
                        พาสเจอร์ไรส์ทัวร์นาเมนท์นู้ดธุรกรรม
                        ราสเบอร์รีวอร์รูมอาข่า เมี่ยงคำหมวยดั๊มพ์แอร์ ลาตินปาสเตอร์ แทงกั๊กซาร์ครัวซองฮีโร่
                        วอล์กแฟรี่คำสาปอีแต๋นสต๊อก</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center align-items-center">
                    <button type="button" class="btn view-btn" onclick="location.href='{{ url('/awards') }}'">See All
                        Award</button>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center section-title">{{ __('messages.home.contactHeading') }}</h1>
            </div>
            <div class="col-md-6">
                <iframe class="resp-iframe"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.192181848043!2d100.56834121477938!3d13.76728119033743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29e88a01f5421%3A0x50acb168a55704d1!2sMcTric%20Company%20Limited!5e0!3m2!1sth!2sth!4v1569432124464!5m2!1sth!2sth"
                    width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
            <div class="col-md-1" style="padding-bottom: 50px;"></div>
            <div class="col-md-5">
                <h5>{{ __('messages.home.contactAddress') }}</h5>
                <p>121/105 อาคารอาร์เอส ทาวเวอร์ ชั้น 39 <br> ถนนรัชดาภิเษก แขวงดินแดง เขตดินแดง กรุงเทพมหานคร 10400
                </p>

                <h5>{{ __('messages.home.contactEmail') }}</h5>
                <p>ADMIN@MCTRIC.COM</p>

                <h5>{{ __('messages.home.contactCall') }}</h5>
                <p>{{ __('messages.home.contactPhone') }}: +66 (0) 2641 2100 <br> {{ __('messages.home.contactFax') }}:
                    +66 (0) 2641 2030</p>
            </div>
        </div>
    </div>
</section>
@endsection