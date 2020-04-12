@extends('app')

@section('title', 'Create Award')

@section('content')
<div class="sub-title">
    <div class="container">
        <h1 class="text-ellipsis text-center">
            Create Client Form
        </h1>
    </div>
</div>
<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form-style">
                    {!! Form::open(['url' => 'awards', 'method' => 'post', 'files' => 'true']) !!}
                    @include('award._create-form')
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