@extends('app')

@section('title', "Sort Businesses")

@section('content')
    <header class="sub-title">
        <div class="sub-title-overlay"></div>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white" style="z-index: 3">
                    <h1 class="text-ellipsis text-center">
                        Sort Businesses
                    </h1>
                </div>
            </div>
        </div>
    </header>
    <section class="bg-white">
        <div class="container">
            <form method="POST" action="{{ url('/businesses/sort') }}" class="col-md-12 col-xs-12">
                @csrf
                <input type='hidden' name='sorted' id='sortField'>
                <div id="sortable">
                    @foreach($businesses as $business)
                        <div class="card mb-12" style="max-width: 100%; max-height: 75px; margin-bottom: 5px" id='{{ 'order_'.$business->id }}'>
                            <div class="row no-gutters">
                                <div class="col-md-1">
                                    <img src="{{ url('image/show/'.$business->cover_image) }}" class="card-img" style="max-height: 75px;height: 75px;object-fit: cover">
                                </div>
                                <div class="col-md-11">
                                    <div class="card-body">
                                        <h3>{{ $loop->iteration }}. {{ $business->name }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type='submit' id="submit">Submit</button>
            </form>
        </div>
    </section>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
