@extends('app')

@section('title', 'Edit User')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                Edit User
            </h1>
        </div>
    </div>
    <section class="bg-light">
        <div class="container">
            <div style="position: fixed; top: 50%; left: 27px; z-index: 100;">
                <button type="button" class="btn btn-primary"
                    onclick="location.href='{{ url('dashboard/users/') }}'">Back</button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-style">
                        {!! Form::model($user, ['url' => 'users/'.$user->id, 'method' => 'put', 'files' => 'true']) !!}
                        @include('user._edit-form')
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
