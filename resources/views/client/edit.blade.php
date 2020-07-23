@extends('app')

@section('title', __('messages.home.webTitle'))

@section('content')
<div class="sub-title">
    <div class="container">
        <h1 class="text-ellipsis text-center">
            Client
        </h1>
    </div>
</div>
<section class="bg-light">
    <div class="container">
        <div style="position: fixed; top: 50%; left: 27px; z-index: 100;">
            <button type="button" class="btn btn-primary"
                onclick="location.href='{{ url('dashboard/clients/') }}'">Back</button>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-style">
                    {!! Form::model($client, ['url' => 'clients/'.$client->id, 'method' => 'put', 'files' => 'true'])!!}
                    @include('client._edit-form')
                    <div class="text-center">
                        <button class="btn btn-primary form-control submit-edit-btn" type="submit">Finish</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            $('#preview')
                .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            $('#previewCard').removeClass('hidden')
        }
    }
</script>
@endsection
