@extends('app')

@section('title', 'Business')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                Admin Dashboard
            </h1>
        </div>
    </div>
    <section class="bg-light">
        <div class="container">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-justified">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#business">Business</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#career">Career</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#client">Client</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#award">Award</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane container active" id="business">
                    <div style="padding-top: 3%; padding-bottom: 3%">
                        <h2>จัดการ Business <a class="btn btn-primary" href="{{ url("businesses/create") }}">Create</a>
                        </h2>
                    </div>
                    <div class="row">
                        @foreach($businesses as $business)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img class="card-img-top" src="{{ url('image/show/'.$business->cover_image) }}"
                                         alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">{{ $business->name }}</h5>
                                        <div class="text-center">
                                            <button type="button" class="btn learn-more-btn"
                                                    onclick="location.href='{{ url('businesses/'.$business->id) }}'">
                                                รายละเอียด
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        {!! Form::model($business, ['method' => 'delete', 'url' => '/businesses/'.$business->id]) !!}
                                        <a href="{{ url('businesses/'. $business->id ."/edit") }}"
                                           class="btn btn-warning">Edit</a>
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane container fade" id="career">
                    <div style="padding-top: 3%; padding-bottom: 3%">
                        <h2>จัดการ Career</h2>
                    </div>
                </div>
                <div class="tab-pane container fade" id="client">
                    <div style="padding-top: 3%; padding-bottom: 3%">
                        <h2>จัดการ Client</h2>
                    </div>
                </div>
                <div class="tab-pane container fade" id="award">
                    <div style="padding-top: 3%; padding-bottom: 3%">
                        <h2>จัดการ Award</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
