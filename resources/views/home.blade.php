@extends('app')

@section('title', __('messages.home.webTitle'))

@section('content')
    <header id="page-top">
        <div class="overlay"></div>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white" style="z-index: 3">
                    <h1 class="header-title">{{ __('messages.home.companyTitle') }}</h1>
                    <span class="header-subtitle">{{ __('messages.home.companySubtitle') }}</span><br>
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
                <div class="col-lg-6 v-center">
                    <div class="form-group">
                        <h2 class="bottom15">{{ __('messages.home.aboutHeading') }}</h2>
                        <p>{{ __('messages.home.aboutParagraphOne') }}</p>
                        <p>{{ __('messages.home.aboutParagraphTwo') }}</p>
                        <p>{{ __('messages.home.aboutParagraphThree') }}</p>
                    </div>
                </div>
                <div class="col-lg-6 v-center">
                    <div class="iframe-container form-group">
                        <iframe src="https://www.youtube.com/embed/NlIv4u7dtQU" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section
        style="background-image: url(https://images.pexels.com/photos/310479/pexels-photo-310479.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
    background-blend-mode: overlay;
    background-size: cover;
    width: 100%; color: #FFFFFF; background-position: center center">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="vision-wrapper">
                        <h2 class="mb-4">{{ __('messages.home.philosophyHeading') }}</h2>
                        <p>{{ __('messages.home.philosophyParagraphOne') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="vision-wrapper">
                        <h2 class="mb-4">{{ __('messages.home.missionHeading') }}</h2>
                        <p>{{ __('messages.home.missionOne') }} <br>
                            {{ __('messages.home.missionTwo') }} <br>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="vision-wrapper">
                        <h2 class="mb-4">{{ __('messages.home.policyHeading') }}</h2>
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
                <div class="col-lg-4 col-md-6">
                    <a href="{{ url('businesses/category/civil_construction') }}">
                        <div class="service-box"
                            style="background-image: url(https://image.freepik.com/free-photo/construction-silhouette_1127-3246.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
                            <div class="services-wrapper">
                                <h4>{{ __('messages.home.civilMenu') }}</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="{{ url('businesses/category/mechanical_electrical_services_plumbing_services') }}">
                        <div class="service-box"
                            style="background-image: url(https://image.freepik.com/free-photo/tools-equipment-plumbing-table_23-2147772310.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
                            <div class="services-wrapper">
                                <h4>{{ __('messages.home.mechanicalMenu') }}</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="{{ url('businesses/category/utility_pipeline') }}">
                        <div class="service-box"
                            style="background-image: url(https://image.freepik.com/free-photo/air-conditioning-buildings_179755-11.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
                            <div class="services-wrapper">
                                <h4>{{ __('messages.home.utilityMenu') }}</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="{{ url('businesses/category/renew_energy') }}">
                        <div class="service-box"
                            style="background-image: url(https://image.freepik.com/free-photo/man-worker-firld-by-solar-panels_1303-15597.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
                            <div class="services-wrapper">
                                <h4>{{ __('messages.home.renewableMenu') }}</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <!--
                                    <div class="col-lg-4 col-md-6">
                                        <a href="{{ url('businesses/category/supply_chain_automation_systems') }}">
                                            <div class="service-box"
                                                style="background-image: url(https://image.freepik.com/free-photo/foreman-control-loading-containers-box-truck_28668-241.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
                                                <div class="services-wrapper">
                                                    <h4>{{ __('messages.home.supplyMenu') }}</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    -->
                <div class="col-lg-4 col-md-6">
                    <a href="{{ url('businesses/category/joint_venture_project') }}">
                        <div class="service-box"
                            style="background-image: url(https://images.pexels.com/photos/3740400/pexels-photo-3740400.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
                            <div class="services-wrapper">
                                <h4>{{ __('messages.home.jointVentureMenu') }}</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center align-items-center">
                        <a href="{{ url('/businesses') }}" class="btn view-btn business-btn">
                            {{ __('messages.home.businessButton') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section
        style="background-image: url(https://images.pexels.com/photos/310479/pexels-photo-310479.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
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
                    <div>
                        <h4 class="text-white" style="padding-bottom: 10px;">{{ __('messages.home.careersSubHeading') }}
                        </h4>
                        <p class="text-white">{{ __('messages.home.careersParagraphOne') }}</p>
                        <p class="text-white">{{ __('messages.home.careersParagraphTwo') }}</p>
                    </div>
                </div>
                <div class="col-md-6 v-center">
                    <div class="owl-job owl-carousel">
                        @foreach ($careers as $career)
                            <div class="image">
                                <img class="d-block w-100" src="{{ url('image/show/' . $career->image_id) }}"
                                    style="height: 300px; width: 100%; object-fit: cover;">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center align-items-center">
                        <a href="{{ url('/careers') }}" class="btn view-btn">
                            {{ __('messages.home.careersButton') }}
                        </a>
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
                    @foreach ($clients as $client)
                        <div>
                            <img class="image-client" src="{{ url('image/show/' . $client->image_id) }}">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center align-items-center">
                        <a href="{{ url('/clients') }}" class="btn view-btn">
                            {{ __('messages.home.clientButton') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section
        style="background-image: url(https://images.pexels.com/photos/310479/pexels-photo-310479.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
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
                        <a href="{{ url('/awards') }}" class="btn view-btn">
                            {{ __('messages.home.awardButton') }}
                        </a>
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
                    <div class="map-wrapper mb-3">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.192181848043!2d100.56834121477938!3d13.76728119033743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29e88a01f5421%3A0x50acb168a55704d1!2sMcTric%20Company%20Limited!5e0!3m2!1sth!2sth!4v1569432124464!5m2!1sth!2sth"
                            width="100%" height="500px" style="border:0; margin-top: -150px;"></iframe>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="row about-map-desc-wrapper">
                        <div class="col-md-12">
                            <h5 class="contact-content-title"><i class="fas fa-map-marker-alt"></i>
                                {{ __('messages.contact.contactAddress') }}</h5>
                            <p class="contact-address-container">
                                {{ __('messages.contact.contactCompanyName') }} <br>
                                {{ __('messages.home.contactAddressDesc') }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <h5 class="contact-content-title"><i class="fas fa-envelope"></i>
                                {{ __('messages.contact.contactEmail') }}</h5>
                            <p>{{ __('messages.home.contactEmailDesc') }}</p>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <h5 class="contact-content-title"><i class="fas fa-phone-square"></i>
                                {{ __('messages.contact.contactCall') }}</h5>
                            <p>{{ __('messages.contact.contactPhone') }}: +66 (0) 2641 2100 <br>
                                {{ __('messages.contact.contactFax') }}: +66 (0) 2641 2030</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6" style="margin-bottom: 1rem;">
                            <h5 class="contact-content-title"><i class="fas fa-money-check-alt"></i>
                                {{ __('messages.app.chequeTrackMenu') }}</h5>
                            <a href="http://erpmctric.dyndns.org/mangoanywhere/page/authentication/vendor/login/"
                                style="color: #000000;">Cheque Tracking Link</a>
                        </div>
                        <div class="col-sm-6 col-md-6" style="margin-bottom: 1rem;">
                            <h5 class="contact-content-title"><i class="fas fa-file-alt"></i> Internal McTRIC</h5>
                            <a href="https://quickconnect.to/MCTRIC-EBOOK" style="color: #000000;"> Internal McTRIC
                                Link</a>
                        </div>
                    </div>
                    <div class="row mt-2 mb-5">
                        <div class="col-md-12">
                            <a href="https://www.facebook.com/profile.php?id=61556035996506" target="_blank"><i
                                    class="fab fa-facebook fa-2x mr-3" style="cursor: pointer;"></i></a>
                            <a href="https://www.youtube.com/channel/UCpIigCEea3WE5rdFZ99gJ4w" target="_blank"><i
                                    class="fab fa-youtube fa-2x" style="cursor: pointer;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section
        style="background-image: url(https://images.pexels.com/photos/310479/pexels-photo-310479.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
    background-blend-mode: overlay;
    background-size: cover;
    width: 100%; color: #FFFFFF; background-position: center center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-white section-title" style="padding-bottom: 35px;">
                        ช่องทางแจ้งข่าว/ติชม/เสนอแนะถึง CEO</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12">
                    <div class="card" style="cursor: unset; border-radius: 15px;">
                        <div class="card-body">
                            <form id="talkToCeoForm">
                                <div class="mb-4" style="padding-top: 15px;">
                                    <label class="form-label" style="color: #000;">ชื่อผู้ติดต่อ</label>
                                    <input type="text" class="form-control" id="reporter-name" name="reporter_name">
                                    <div class="invalid-feedback" id="nameError"></div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" style="color: #000;">เบอร์โทรผู้ติดต่อ</label>
                                    <input type="tel" class="form-control" id="reporter-phone"
                                        name="reporter_phone">
                                    <div class="invalid-feedback" id="nameError"></div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" style="color: #000;">อีเมลผู้ติดต่อ</label>
                                    <input type="email" class="form-control" id="reporter-email"
                                        name="reporter_email">
                                    <div class="invalid-feedback" id="nameError"></div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" style="color: #000;">รายละเอียดข้อมูล <span
                                            style="color: red;">*</span></label>
                                    <textarea class="form-control" id="talk-to-ceo-editor" name="reporter_description" rows="8" required></textarea>
                                    <div class="invalid-feedback" id="messageError"></div>
                                </div>
                                <div class="mb-4">
                                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                                </div>
                                <div style="padding-bottom: 15px;">
                                    <button type="submit" class="btn btn-primary btn-block"
                                        id="talk-to-ceo-submit-btn">ส่งข้อมูล</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // เมื่อ submit ฟอร์มใน modal
            $('#talkToCeoForm').on('submit', function(e) {
                e.preventDefault();
                $('#talk-to-ceo-submit-btn').prop('disabled', true);

                // ดึงค่า token จาก reCAPTCHA
                let recaptchaResponse = grecaptcha.getResponse();

                // ตรวจสอบว่ามีค่า token หรือไม่
                if (!recaptchaResponse) {
                    Swal.fire({
                        icon: 'error',
                        title: 'เกิดข้อผิดพลาด',
                        text: 'กรุณาคลิก reCAPTCHA เพื่อยืนยัน',
                    });

                    $('#talk-to-ceo-submit-btn').prop('disabled', false);

                    return false;
                }

                let url = '{{ route('talk_to_ceo.send') }}';
                let token = '{{ csrf_token() }}';

                let formData = {
                    _token: token,
                    reporter_name: $('#reporter-name').val(),
                    reporter_phone: $('#reporter-phone').val(),
                    reporter_email: $('#reporter-email').val(),
                    reporter_description: $('#talk-to-ceo-editor').val(),
                    'g-recaptcha-response': $('[name="g-recaptcha-response"]').val(),
                };

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#talkToCeoModal').modal('hide');
                        $('#talk-to-ceo-submit-btn').prop('disabled', false);

                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'สำเร็จ',
                                text: response.message,
                            }).then(() => location.reload());
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'เกิดข้อผิดพลาด',
                                text: response.message,
                            });
                        }
                    },
                    error: function(xhr) {
                        $('#talkToCeoModal').modal('hide');
                        $('#talk-to-ceo-submit-btn').prop('disabled', false);

                        // ตรวจสอบว่า response มีสถานะ code 400 (Bad Request)
                        if (xhr.status === 400) {
                            // แปลง responseText ให้เป็น JSON object
                            let response = JSON.parse(xhr.responseText);

                            // ตรวจสอบว่ามี errors หรือไม่
                            if (response.errors) {
                                // ดึงเฉพาะข้อผิดพลาดแรกสุดของ field แรกที่เจอ
                                let firstField = Object.keys(response.errors)[0];
                                errorMessage = response.errors[firstField][0];
                            } else {
                                // ถ้าไม่มี errors (แต่ status เป็น 400) ให้ใช้ message จาก response
                                errorMessage = response.message;
                            }

                            Swal.fire({
                                icon: 'error',
                                title: 'เกิดข้อผิดพลาด',
                                text: errorMessage,
                            });
                        } else {
                            // กรณีเป็น error อื่นๆ ที่ไม่ใช่ 400
                            Swal.fire({
                                icon: 'error',
                                title: 'เกิดข้อผิดพลาด',
                                text: 'ไม่สามารถเชื่อมต่อเซิร์ฟเวอร์ได้',
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
