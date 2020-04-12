<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('image', 'Image') !!}
    {!! Form::file('image', ['accept'=>'image/*', 'class' => 'form-control', 'id' => 'upload', 'value' => 'Choose a files']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['placeholder' => 'Career Name', 'class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('description', 'Description') !!}
    <textarea name="description"></textarea>
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('qualification', 'Qualification') !!}
    <textarea name="qualification"></textarea>
</div>
