@extends('app')

@section('title', 'Create Award')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                Client
            </h1>
        </div>
    </div>
    <section class="bg-light">
        {!! Form::open(['url' => 'awards', 'method' => 'post', 'files' => 'true']) !!}
        @include('award._form')
        <button class="btn btn-primary form-control" type="submit">Finish</button>
        {!! Form::close() !!}
    </section>
@endsection
