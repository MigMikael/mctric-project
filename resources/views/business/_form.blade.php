<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['placeholder' => 'Name of Project', 'class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('client', 'Client') !!}
    {!! Form::text('client', null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Consultant') !!}
    {!! Form::text('consultant', null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Designer') !!}
    {!! Form::text('designer', null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Constructor') !!}
    {!! Form::text('constructor', null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Contract Value') !!}
    {!! Form::text('contract_value', null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Contract Period') !!}
    {!! Form::text('contract_period', null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Scope of Work') !!}
    {!! Form::text('scope_of_work', null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Category') !!}
    {!! Form::text('category', null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Status') !!}
    {!! Form::select('status', $status, null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Display') !!}
    {!! Form::select('display', [true => "Show", false => "Not Show"], null, ['class' => 'form-control']) !!}
</div>
