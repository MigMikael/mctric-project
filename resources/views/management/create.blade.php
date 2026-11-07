@extends('app')

@section('title', __('messages.home.webTitle'))

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                Create Management Team
            </h1>
        </div>
    </div>
    <section class="bg-light">
        <div class="container">
            <div class="back-btn-custom">
                <button type="button" class="btn btn-primary"
                    onclick="location.href='{{ url('dashboard/managements/') }}'">Back</button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-style">
                        <form action="{{ url('/managements') }}" method="POST" enctype="multipart/form-data"
                            id="management-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Display <span class="required">*</span></label>
                                        <select name="display" id="display" class="form-control">
                                            <option value="1">Show</option>
                                            <option value="0">Hide</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                            value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                            value="" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Job Title <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="job_title" id="job_title"
                                            value="" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4 p-1 rounded">
                                        <div class="mb-1">
                                            <label>Profile Image <span class="required">*</span></label>
                                        </div>
                                        <div class="input-group form-group">
                                            <label class="btn btn-outline-primary">
                                                Upload Image
                                                <input accept="image/*" name="profile_image" type="file"
                                                    style="display: none" id="inputImage">
                                            </label>
                                        </div>
                                        <div class="rounded-lg image-preview">
                                            <div class="row">
                                                <div class="col-md-4 form-group">
                                                    <img id="profile_image" src="" class="img-fluid"
                                                        style="height: 250px;" />
                                                    <input type="hidden" id="cropped_image" name="cropped_image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-submit">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cropper Modal -->
        <div class="modal fade" id="cropModal" tabindex="-1" role="dialog" aria-labelledby="cropModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cropModalLabel">Profile Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-cropper-container img-container">
                            <img id="modalImage" src="" alt="Picture">
                        </div>
                        <div class="text-center mt-3">
                            <button id="zoom-in-btn" class="btn btn-outline-primary">
                                <i class="fas fa-search-plus"></i>
                            </button>
                            <button id="zoom-out-btn" class="btn btn-outline-primary">
                                <i class="fas fa-search-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                        <button type="button" id="cropButton" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <style>
        #cropModal {
            z-index: 1050;
            background-color: transparent;
        }

        .modal-cropper-container {
            max-width: 100%;
            height: auto;
            overflow: hidden;
            text-align: center;
        }

        .img-container img {
            max-width: 100%;
            height: auto;
            display: inline-block;
        }

        .img-container {
            width: 100%;
            max-height: 500px;
            /* กำหนดความสูงตามที่เหมาะสม */
            overflow: hidden;
        }
    </style>
    <script>
        $(document).ready(function() {
            var inputImage = document.getElementById('inputImage');
            var profileImage = document.getElementById('profile_image');
            var modalImage = document.getElementById('modalImage');
            var cropButton = document.getElementById('cropButton');
            var croppedImageInput = document.getElementById('cropped_image');
            var cropModal = $('#cropModal');
            var cropper;

            inputImage.addEventListener('change', function(e) {
                var files = e.target.files;
                var done = function(url) {
                    inputImage.value = '';
                    modalImage.src = url;
                    cropModal.modal('show');
                    if (cropper) {
                        cropper.destroy();
                    }
                    cropper = new Cropper(modalImage, {
                        preview: '.img-preview',
                        aspectRatio: 1,
                        viewMode: 2,
                        autoCropArea: 1,
                        zoomRatio: 0.1
                    });
                };
                var reader;
                var file;
                var url;

                if (files && files.length > 0) {
                    file = files[0];

                    if (URL) {
                        done(URL.createObjectURL(file));
                    } else if (FileReader) {
                        reader = new FileReader();
                        reader.onload = function(e) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });

            cropButton.addEventListener('click', function() {
                if (cropper) {
                    var canvas = cropper.getCroppedCanvas({
                        width: 400, // เปลี่ยนค่าตามความเหมาะสม
                        height: 400, // เปลี่ยนค่าตามความเหมาะสม
                    });

                    canvas.toBlob(function(blob) {
                        var reader = new FileReader();
                        reader.readAsDataURL(blob);
                        reader.onloadend = function() {
                            croppedImageInput.value = reader.result;
                            profileImage.src = reader.result; // แสดงภาพที่ถูก crop ใน preview
                            cropModal.modal('hide');
                        };
                    });
                }
            });

            /*
            document.getElementById('management-form').addEventListener('submit', function(e) {
                if (cropper) {
                    e.preventDefault();
                    var canvas = cropper.getCroppedCanvas({
                        width: 400,
                        height: 400,
                    });

                    canvas.toBlob(function(blob) {
                        var reader = new FileReader();
                        reader.readAsDataURL(blob);
                        reader.onloadend = function() {
                            croppedImageInput.value = reader.result;
                            e.target.submit();
                        };
                    });
                }
            });
            */

            // เพิ่มการจัดการเหตุการณ์สำหรับปุ่ม Zoom In
            document.getElementById('zoom-in-btn').addEventListener('click', function() {
                cropper.zoom(0.1);
            });

            // เพิ่มการจัดการเหตุการณ์สำหรับปุ่ม Zoom Out
            document.getElementById('zoom-out-btn').addEventListener('click', function() {
                cropper.zoom(-0.1);
            });

            // validate function
            $(".btn-submit").click(function(e) {
                e.preventDefault();

                var isOk = true;
                var messageError = "";

                var first_name = $("#first_name").val();
                var last_name = $("#last_name").val();
                var job_title = $("#job_title").val();

                if (first_name === null || first_name === '') {
                    isOk = false;
                    messageError = "กรุณาระบุ ชื่อ";
                } else if (last_name === null || last_name === '') {
                    isOk = false;
                    messageError = "กรุณาระบุ นามสกุล"
                } else if (job_title === null || job_title === '') {
                    isOk = false;
                    messageError = "กรุณาระบุ ตำแหน่ง"
                }
                else if (!croppedImageInput.value.trim()) {
                    isOk = false;
                    messageError = 'กรุณาอัปโหลดรูปโปรไฟล์';
                }

                if (isOk) {
                    $('#management-form').submit();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'พบข้อผิดพลาด',
                        text: messageError,
                    })
                }
            });
        });
    </script>
@endsection
