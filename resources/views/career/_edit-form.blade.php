<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('old_image', 'Old Logo') !!}
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 shadow-img">
        <img class="responsive"
             src="{{ url('image/show/'.$career->image_id) }}"
             alt="Card image cap">
    </div>
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('image', 'Image') !!}
    {!! Form::file('image', ['accept'=>'image/*', 'class' => 'form-control', 'id' => 'upload', 'value' => 'Choose a files', 'onchange' => 'readURL(this)']) !!}
    <div id="previewCard" class="hidden col-lg-4 col-md-6 col-sm-6 col-xs-12 shadow-img">
        <img class="responsive" id="preview" src="http://placehold.it/180" alt="your image" />
    </div>
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['placeholder' => 'Career Name', 'class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('description', 'Description') !!}
    <textarea name="description">{{ $career-> description }}</textarea>
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('qualification', 'Qualification') !!}
    <textarea name="qualification">{{ $career-> qualification }}</textarea>
</div>
