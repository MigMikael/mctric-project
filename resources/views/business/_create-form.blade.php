<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Display') !!}
    {!! Form::select('display', [true => "Show", false => "Hide"], null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['placeholder' => 'Name of Project', 'class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('description', 'Description') !!}
    <textarea name="description"></textarea>
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
    {!! Form::label('Contractor') !!}
    {!! Form::text('contractor', null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Main Contractor') !!}
    {!! Form::text('main_contractor', null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Contract Value') !!}
    {!! Form::number('contract_value', null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Contract Start') !!}
    {!! Form::date('contract_start', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Contract End') !!}
    {!! Form::date('contract_end', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Show Year Start') !!}
    {!! Form::date('show_year_start', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Show Year End') !!}
    {!! Form::date('show_year_end', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Scope of Work') !!}
    <textarea name="scope_of_work"></textarea>
</div>

{{--<div class="col-md-12" style="margin-bottom: 3%">--}}
{{--    {!! Form::label('Category') !!}--}}
{{--    {!! Form::select('category', $category, null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Category') !!}
    <div>
        {!! Form::select('category[]', $category, null, ['class' => 'form-control', 'multiple' => 'multiple', 'id' => 'category-select']) !!}
    </div>
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Status') !!}
    {!! Form::select('status', $status, null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Completion (%)') !!}<br>
    {!! Form::selectRange('completion', 0, 100) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('cover_image', 'Cover Image') !!} (ขั้นต่ำ 500 x 500px)
    {!! Form::file('cover_image', ['accept'=>'image/*', 'class' => 'form-control', 'value' => 'Choose
    a files', 'onchange' => 'readURL(this)']) !!}
    <div id="previewCard" class="hidden col-xs-12 shadow-img">
        <img class="responsive" id="preview" src="http://placehold.it/180" alt="your image" width="45%" />
    </div>
</div>

{{--<div class="col-md-12" style="margin-bottom: 3%">--}}
{{--    {!! Form::label('images', 'Images (Multiple File)') !!} (ขั้นต่ำ 500 x 500px)--}}
{{--    {!! Form::file('images[]', ['multiple'=>true, 'accept'=>'image/*', 'class' => 'form-control', 'id' => 'upload',--}}
{{--    'value' => 'Choose a files']) !!}--}}
{{--    <div id="image-holder" class="col-xs-12 responsive"></div>--}}
{{--</div>--}}
<div class="col-md-12" style="margin-bottom: 3%">
    <label>Multiple Image (ขั้นต่ำ 500 x 500px)</label>
    <div id="fileuploader"></div>
    {!! Form::hidden('images', null, ['id' => 'hidden_image']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Facebook') !!}
    {!! Form::text('social_facebook', null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Youtube') !!}
    {!! Form::text('social_youtube', null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Instagram') !!}
    {!! Form::text('social_instagram', null, ['class' => 'form-control']) !!}
</div>

<div class="col-md-12" style="margin-bottom: 3%">
    {!! Form::label('Website') !!}
    {!! Form::text('social_website', null, ['class' => 'form-control']) !!}
</div>
