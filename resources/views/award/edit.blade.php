@extends('app')

@section('title', 'Edit Award')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                Award
            </h1>
        </div>
    </div>
    <section class="bg-light">
        {!! Form::model($award, ['url' => 'awards/'.$award->id, 'method' => 'put', 'files' => 'true']) !!}
        @include('award._form')
        <button class="btn btn-primary form-control" type="submit">Finish</button>
        {!! Form::close() !!}
    </section>
@endsection
