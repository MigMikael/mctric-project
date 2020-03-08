@extends('app')

@section('title', 'Create Client')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                Client
            </h1>
        </div>
    </div>
    <section class="bg-light">
        {!! Form::open(['url' => 'clients', 'method' => 'post', 'files' => 'true']) !!}
        @include('client._form')
        <button class="btn btn-primary form-control" type="submit">Finish</button>
        {!! Form::close() !!}
    </section>
@endsection