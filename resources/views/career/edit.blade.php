@extends('app')

@section('title', 'Edit Career')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                Career
            </h1>
        </div>
    </div>
    <section class="bg-light">
        {!! Form::model($career, ['url' => 'careers/'.$career->id, 'method' => 'put', 'files' => 'true']) !!}
        @include('career._form')
        <button class="btn btn-primary form-control" type="submit">Finish</button>
        {!! Form::close() !!}
    </section>
@endsection
