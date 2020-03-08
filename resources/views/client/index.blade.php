@extends('app')

@section('title', 'Client')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                Client
            </h1>
        </div>
    </div>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center" style="padding-bottom: 50px;">ลูกค้า</h1>
                </div>
                @foreach($clients as $client)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <img class="card-img-top"
                                 src="{{ url('image/show/'.$client->image_id) }}"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-center">
                                    {!! $client->name !!}
                                </h5>
                                <p>
                                    {!! $client->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
