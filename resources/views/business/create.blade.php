@extends('app')

@section('title', __('messages.home.webTitle'))

@section('content')
<div class="sub-title">
    <div class="container">
        <h1 class="text-ellipsis text-center">
            Create Business
        </h1>
    </div>
</div>
<section class="bg-light">
    <div class="container">
        <div class="back-btn-custom">
            <button type="button" class="btn btn-primary"
                onclick="location.href='{{ url('dashboard/businesses/') }}'">Back</button>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-style">
                    {!! Form::open(['url' => 'businesses', 'method' => 'post', 'files' => 'true']) !!}
                    @include('business._create-form')
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

@section('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                $('#previewCard').removeClass('hidden')
            }
        }

        $("#upload").on('change', function () {
            var countFiles = $(this)[0].files.length;

            var imgPath = $(this)[0].value;
            var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            var image_holder = $("#image-holder");
            image_holder.empty();

            if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                if (typeof (FileReader) != "undefined") {

                    //loop for each file selected for uploaded.
                    for (var i = 0; i < countFiles; i++) {

                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $("<img />", {
                                "src": e.target.result,
                                "class": "thumb-image shadow-img",
                                "width": "50%",
                            }).appendTo(image_holder);
                        }

                        image_holder.show();
                        reader.readAsDataURL($(this)[0].files[i]);
                    }

                } else {
                    alert("This browser does not support FileReader.");
                }
            } else {
                alert("Pls select only images");
            }
        });

        $(document).ready(function() {
            $('#category-select').multiselect();
        });
    </script>
    <script>
        $(document).ready(function()
        {
            var images = [];
            $("#fileuploader").uploadFile({
                url: "{{ url('upload_image') }}",
                multiple: false,
                dragDrop: true,
                fileName: "image",
                acceptFiles: "image/*",
                showPreview: true,
                previewHeight: "100px",
                previewWidth: "100px",
                sequential: true,
                sequentialCount:1,
                onSuccess: function (files,data,xhr,pd) {
                    // alert(data);
                    images.push(data["id"]);
                    $("#hidden_image").val(images);
                }
            });
        });
    </script>
@endsection
