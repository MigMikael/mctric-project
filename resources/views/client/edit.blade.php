@extends('app')

@section('title', 'Edit Client')

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