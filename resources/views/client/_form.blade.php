<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('image', 'Logo') !!}
    {!! Form::file('image', ['accept'=>'image/*', 'class' => 'form-control', 'id' => 'upload', 'value' => 'Choose a files']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['placeholder' => 'Name of Client', 'class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('description', 'Description') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>
