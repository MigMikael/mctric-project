@extends('app')

@section('title', __('messages.home.webTitle'))

@section('content')
<header class="sub-title">
    <div class="sub-title-overlay"></div>
    <div class="container h-100">
        <div class="d-flex h-100 text-center align-items-center">
            <div class="w-100 text-white" style="z-index: 3">
                <h1 class="text-ellipsis text-center">
                    {{ __('messages.app.aboutMenu') }}
                </h1>
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
                        <iframe src="https://www.youtube.com/embed/NlIv4u7dtQU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 form-group">
                    <div class="vision-wrapper">
                        <h2 class="mb-4">{{ __('messages.home.philosophyHeading') }}</h2>
                        <p>{{ __('messages.home.philosophyParagraphOne') }}</p>
                    </div>
                </div>
                <div class="col-md-4 form-group">
                    <div class="vision-wrapper">
                        <h2 class="mb-4">{{ __('messages.home.missionHeading') }}</h2>
                            <p>{{ __('messages.home.missionOne') }} <br>
                                {{ __('messages.home.missionTwo') }} <br>
                                <!--{{ __('messages.home.missionThree') }}-->
                            </p>
                    </div>
                </div>
                <div class="col-md-4 form-group">
                    <div class="vision-wrapper">
                        <h2 class="mb-4">{{ __('messages.home.policyHeading') }}</h2>
                        <p>{{ __('messages.home.policyDescription') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="mb-4">{{ __('messages.home.objectiveHeading') }}</h2>
                    <p>
                        {{ __('messages.home.objectiveOne') }}<br>
                        {{ __('messages.home.objectiveTwo') }}<br>
                        {{ __('messages.home.objectiveThree') }}<br>
                        {{ __('messages.home.objectiveFour') }}<br>
                        {{ __('messages.home.objectiveFive') }}<br>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-light">
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
                            {{ __('messages.home.clientButton') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center section-title">{{ __('messages.home.awardHeading') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="award-wrapper text-center">
                        <div style="padding-bottom: 50px;">
                            <i class="fas fa-award fa-5x"></i>
                        </div>
                        <p>{{ __('messages.home.awardDescription') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center align-items-center">
                        <button type="button" class="btn view-btn" onclick="location.href='{{ url('/awards') }}'">{{ __('messages.home.awardButton') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center section-title">{{ __('messages.home.companyAnnouncementHeading') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="award-wrapper text-center">
                        <div style="padding-bottom: 50px;">
                            <i class="fas fa-building fa-5x"></i>
                        </div>
                        <p>{{ __('messages.home.companyAnnouncementDescription') }}</p>
                    </div>
                </div>
            </div>
            <div class="row document-wrapper">
                <div class="col-md-12">
                    <div class="text-center">
                        <div class="mb-4">
                            <a class="btn btn-primary" href="{{ asset('document/รายงานประจำปี_2566.pdf') }}" download>รายงานประจำปี 2566</a>
                        </div>
                        <div class="mb-4">
                            <a class="btn btn-primary" href="{{ asset('document/หนังสือเชิญประชุมสามัญผู้ถือหุ้นประจำปี_2567.pdf') }}" download>หนังสือเชิญประชุมสามัญผู้ถือหุ้นประจำปี 2567</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
