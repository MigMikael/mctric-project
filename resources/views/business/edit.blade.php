@extends('app')

@section('title', __('messages.home.webTitle'))

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                Edit Business
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
                        {!! Form::model($business, ['url' => 'businesses/'.$business->id, 'method' => 'put', 'files' => 'true']) !!}
                        @include('business._edit-form')
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
            var all_image = [];
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
                returnType: "json",
                showDelete: true,
                onSuccess: function (files,data,xhr,pd) {
                    // alert(data);
                    images.push(data["id"]);
                    all_image.push(data);
                    $("#hidden_image").val(images);
                    $("#edit_image").val("True");
                },
                onLoad: function (obj) {
                    $.ajax({
                        cache: false,
                        url: "{{ url('preload_image/'.$business->id) }}",
                        dataType: "json",
                        success: function(data)
                        {
                            all_image = data;
                            for(var i=0;i<data.length;i++)
                            {
                                obj.createProgress(data[i]["name"],data[i]["path"],data[i]["size"]);
                                images.push(data[i]["id"]);
                            }
                            $("#hidden_image").val(images);
                            $("#edit_image").val("False");
                        }
                    });
                },
                deleteCallback: function (data, pd) {
                    var removeIndex = null;
                    var removeId = null;
                    for(var i = 0; i < all_image.length; i++) {
                        if (all_image[i].name === data[0]) {
                            removeId = all_image[i].id;
                            removeIndex = i;
                        }
                    }
                    for (var i = 0; i < data.length; i++) {
                        $.post("{{ url('/delete_image/') }}", {op: "delete",id: removeId},
                            function (resp,textStatus, jqXHR) {
                                images = images.filter(function (obj) {
                                    return obj !== removeId;
                                });

                                all_image = all_image.filter(function (image) {
                                    return image.id !== removeId;
                                });
                                $("#hidden_image").val(images);
                                $("#edit_image").val("True");
                            });
                    }

                    pd.statusbar.hide();
                },
            });
        });
    </script>
@endsection
