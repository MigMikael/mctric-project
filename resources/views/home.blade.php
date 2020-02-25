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
                    <button type="button" class="btn view-btn video-btn" data-toggle="modal" data-src="https://player.vimeo.com/video/383726515" data-target="#myModal">
                        <i class="fas fa-play-circle fa-lg"></i> Watch Our
                        Story</button>
                </div>
            </div>
        </div>
    </header>
@endsection
