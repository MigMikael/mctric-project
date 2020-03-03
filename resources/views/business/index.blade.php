@extends('app')

@section('title', 'Business')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                Business
            </h1>
            <!--
            <a href="{{ url('businesses/create') }}" class="btn btn-primary">Create</a>
            -->
        </div>
    </div>
    <section class="services">
        <div class="container">
           <div class="section-title">
              <h2>บริการของเรา</h2>
              <p class="col-md-8 offset-md-2">คำอธิบาย</p>
           </div>
           <div class="row">
              <div class="col-lg-4 col-md-6" data-aos="fade-up">
                  <div></div>
                 <div class="service-box" style="background-image: url(https://image.freepik.com/free-photo/construction-silhouette_1127-3246.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
                 background-blend-mode: overlay;
                 background-position: center; background-size: cover;">
                     <div class="services-wrapper">
                    <h4><a href="">Civil & Construction</a></h4>
                      </div>
                 </div>
              </div>
              <div class="col-lg-4 col-md-6" data-aos="fade-up">
                 <div class="service-box" style="background-image: url(https://image.freepik.com/free-photo/tools-equipment-plumbing-table_23-2147772310.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
                 background-blend-mode: overlay; background-position: center; background-size: cover;">
                 <div class="services-wrapper">
                    <h4><a href="">Mechanical, Electrical and Plumbing services (MEP)</a></h4>
                  </div>
                 </div>
              </div>
              <div class="col-lg-4 col-md-6" data-aos="fade-up">
                 <div class="service-box" style="background-image: url(https://image.freepik.com/free-photo/air-conditioning-buildings_179755-11.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
                 background-blend-mode: overlay;
                 background-position: center; background-size: cover;">
                 <div class="services-wrapper">
                    <h4><a href="">Utility Pipeline</a></h4>
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
                    <h4 style="text-white"><a href="">Renewable Energy</a></h4>
                  </div>
                 </div>
              </div>
              <div class="col-lg-4 col-md-6" data-aos="fade-up">
                 <div class="service-box" style="background-image: url(https://image.freepik.com/free-photo/foreman-control-loading-containers-box-truck_28668-241.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
                 background-blend-mode: overlay;
                 background-position: center; background-size: cover;">
                 <div class="services-wrapper">
                    <h4><a href="">Logistic system</a></h4>
                  </div>
                 </div>
              </div>
              <div class="col-lg-2">
              </div>
           </div>
        </div>
    </section>
    <!--
    <section class="bg-white">
        <hr>
        <div>
            @foreach($businesses as $business)
                <a href="{{ url('businesses/'.$business->id) }}">
                    <div style="background-image: url('{{ url('image/show/'.$business->image) }}'); background-size: cover; padding-top: 3%; padding-bottom: 3%">
                        <div class="col-md-6" style="background-color: rgba(255, 255, 255, 0.7)">
                            <h1>Name: {{ $business->name }}</h1>
                            @if($business->client != "")
                                <h2>Client: {{ $business->client }}</h2>
                            @endif
                            @if($business->consultant != "")
                                <p>Consultant: {{ $business->consultant }}</p>
                            @endif
                            @if($business->designer != "")
                                <p>Designer: {{ $business->designer }}</p>
                            @endif
                            @if($business->constructor != "")
                                <p>Constructor: {{ $business->constructor }}</p>
                            @endif
                            @if($business->contract_value != "")
                                <p>Contract Value: {{ $business->contract_value }}</p>
                            @endif
                            @if($business->contract_period != "")
                                <p>Contract Peroid: {{ $business->contract_period }}</p>
                            @endif
                            @if($business->scope_of_work != "")
                                <p>Scope Of Work: {{ $business->scope_of_work }}</p>
                            @endif
                            <div class="col-md-12">
                                {!! Form::model($business, ['method' => 'delete', 'url' => '/businesses/'.$business->id]) !!}
                                <a href="{{ url('businesses/'. $business->id ."/edit") }}" class="btn btn-warning">Edit</a>
                                <button class="btn btn-danger" type="submit">Delete</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </a>
                <hr>
            @endforeach
        </div>
    </section>
    -->
@endsection
