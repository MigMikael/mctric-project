<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['placeholder' => '', 'class' => 'form-control']) !!}
    @if ($errors->has('name'))
        <p class="small" style="color: red">{{ $errors->first('name') }}</p>
    @endif
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['placeholder' => '', 'class' => 'form-control']) !!}
    @if ($errors->has('email'))
        <p class="small" style="color: red">{{ $errors->first('email') }}</p>
    @endif
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('password', 'New Password') !!}
    {!! Form::password('password', ['placeholder' => '', 'class' => 'form-control']) !!}
    @if ($errors->has('password'))
        <p class="small" style="color: red">{{ $errors->first('password') }}</p>
    @endif
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('password_confirmation', 'Confirm New Password') !!}
    {!! Form::password('password_confirmation', ['placeholder' => '', 'class' => 'form-control']) !!}
</div>
