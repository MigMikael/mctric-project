@extends('app')

@section('title', 'Create Business')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                Business
            </h1>
        </div>
    </div>
    <section class="bg-light">
        {!! Form::model($business, ['url' => 'businesses/'.$business->id, 'method' => 'put', 'files' => 'true']) !!}
            @include('business._form')
            <button class="btn btn-primary form-control" type="submit">Finish</button>
        {!! Form::close() !!}
    </section>
@endsection
