<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['placeholder' => '', 'class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['placeholder' => '', 'class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('password', 'Old Password') !!}
    {!! Form::password('password_old', ['placeholder' => '', 'class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('password', 'New Password') !!}
    {!! Form::password('password', ['placeholder' => '', 'class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('confirm_password', 'Confirm New Password') !!}
    {!! Form::password('confirm_password', ['placeholder' => '', 'class' => 'form-control']) !!}
</div>
