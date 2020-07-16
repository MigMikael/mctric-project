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
                <div class="col-md-6 v-center">
                    <div class="desc">
                       <h2 class="bottom15">{{ __('messages.home.aboutHeading') }}</h2>
                        <p>{{ __('messages.home.aboutParagraphOne') }}</p>
                        <p>{{ __('messages.home.aboutParagraphTwo') }}</p>
                        <p>{{ __('messages.home.aboutParagraphThree') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="iframe-container">
                        <iframe src="https://www.youtube.com/embed/NlIv4u7dtQU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="row vision-section">
                <div class="col-md-6">
                    <div class="image image-about">
                        <img src="https://images.pexels.com/photos/2036686/pexels-photo-2036686.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
                    </div>
                </div>
                <div class="col-md-6 v-center">
                    <div class="desc">
                        <h2 class="bottom15">{{ __('messages.home.philosophyHeading') }}</h2>
                        <p>{{ __('messages.home.philosophyParagraphOne') }}</p>
                    </div>
                </div>
            </div>
            <div class="row mission-section">
                <div class="col-md-6 v-center">
                    <div class="desc">
                        <h2 class="bottom15">{{ __('messages.home.missionHeading') }}</h2>
                        <ol class="circle">
                            <li>{{ __('messages.home.missionOne') }}</li>
                            <li>{{ __('messages.home.missionTwo') }}</li>
                            <li>{{ __('messages.home.missionThree') }}</li>
                            <li>{{ __('messages.home.missionFour') }}</li>
                            <li>{{ __('messages.home.missionFive') }}</li>
                        </ol>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image image-about">
                        <img src="https://images.pexels.com/photos/310479/pexels-photo-310479.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
                    </div>
                </div>
            </div>
            <div class="row policy-section">
                <div class="col-md-6">
                    <div class="image image-about">
                        <img src="https://images.pexels.com/photos/1770801/pexels-photo-1770801.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
                    </div>
                </div>
                <div class="col-md-6 v-center">
                    <div class="desc">
                        <h2 class="bottom15">{{ __('messages.home.policyHeading') }}</h2>
                        <p>{{ __('messages.home.policyDescription') }}</p>
                    </div>
                </div>
            </div>
            <div class="row objective-section">
                <div class="col-md-6 v-center">
                    <div class="desc">
                        <h2 class="bottom15">{{ __('messages.home.objectiveHeading') }}</h2>
                        <ol class="circle">
                            <li>{{ __('messages.home.objectiveOne') }}</li>
                            <li>{{ __('messages.home.objectiveTwo') }}</li>
                            <li>{{ __('messages.home.objectiveThree') }}</li>
                            <li>{{ __('messages.home.objectiveFour') }}</li>
                            <li>{{ __('messages.home.objectiveFive') }}</li>
                        </ol>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image image-about">
                        <img src="https://images.pexels.com/photos/2138126/pexels-photo-2138126.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
                    </div>
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
@endsection
