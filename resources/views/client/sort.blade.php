@extends('app')

@section('title', "Sort Clients")

@section('content')
    <header class="sub-title">
        <div class="sub-title-overlay"></div>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white" style="z-index: 3">
                    <h1 class="text-ellipsis text-center">
                        Sort Clients
                    </h1>
                </div>
            </div>
        </div>
    </header>
    <section class="bg-white">
        <div class="container">
            <div class="back-btn-custom">
                <button type="button" class="btn btn-primary"
                    onclick="location.href='{{ url('dashboard/clients/') }}'">Back</button>
            </div>
            <form method="POST" action="{{ url('/clients/sort') }}" class="col-md-12 col-xs-12">
                @csrf
                <input type='hidden' name='sorted' id='sortField'>
                <div id="sortable">
                    @foreach($clients as $client)
                        <div class="card mb-12" style="max-width: 100%; max-height: 75px; margin-bottom: 15px" id='{{ 'order_'.$client->id }}'>
                            <div class="row no-gutters">
                                <div class="col-md-1">
                                    <img src="{{ url('image/show/'.$client->image_id) }}" class="card-img" style="max-height: 75px;height: 75px;object-fit: cover">
                                </div>
                                <div class="col-md-11">
                                    <div class="card-body">
                                        <h5>{{ $loop->iteration }}. {{ $client->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="sort-wrapper text-center">
                    <button type='submit' id="submit" class="btn btn-primary">{{ __('messages.dashboard.saveButton') }}</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $( function() {
            $( "#sortable" ).sortable();
            $( "#sortable" ).disableSelection();
        } );

        $('form').submit(function(){
            $('#sortField').val($( "#sortable" ).sortable("serialize"));
        });
    </script>
@endsection