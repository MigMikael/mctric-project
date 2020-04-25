@extends('app')

@section('title', 'Client')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                {{ __('messages.client.clientHeading') }}
            </h1>
        </div>
    </div>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center" style="padding-bottom: 50px;">{{ __('messages.client.clientSubHeading') }}</h1>
                </div>
                @foreach($clients as $client)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="image">
                                <img class="card-img-top"
                                src="{{ url('image/show/'.$client->image_id) }}"
                                alt="Card image cap">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
