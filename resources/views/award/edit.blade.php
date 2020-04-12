@extends('app')

@section('title', 'Edit Award')

@section('content')
<div class="sub-title">
    <div class="container">
        <h1 class="text-ellipsis text-center">
            Edit Award Form
        </h1>
    </div>
</div>
<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form-style">
                    {!! Form::model($award, ['url' => 'awards/'.$award->id, 'method' => 'put', 'files' => 'true']) !!}
                    @include('award._edit-form')
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