@extends('app')

@section('title', __('messages.home.webTitle'))

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                Edit News
            </h1>
        </div>
    </div>
    <section class="bg-light">
        <div class="container">
            <div class="back-btn-custom">
                <button type="button" class="btn btn-primary"
                    onclick="location.href='{{ url('dashboard/news/') }}'">Back</button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-style">
                        <form action="{{ url('/news/' . $newsItem->id) }}" method="POST" enctype="multipart/form-data"
                            id="news-form" data-has-cover="{{ $newsItem->cover_image_id !== null ? '1' : '0' }}">
                            @csrf
                            @method('PUT')

                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->all() as $message)
                                        <div>{{ $message }}</div>
                                    @endforeach
                                </div>
                            @endif

                            @php
                                $display = (int) old('display', $newsItem->display);
                            @endphp

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Display <span class="required">*</span></label>
                                        <select name="display" id="display" class="form-control">
                                            <option value="1" {{ $display === 1 ? 'selected' : '' }}>Show</option>
                                            <option value="0" {{ $display === 0 ? 'selected' : '' }}>Hide</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="title" id="title"
                                            value="{{ old('title', $newsItem->title) }}" maxlength="255" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4 p-1 rounded">
                                        <div class="mb-1">
                                            <label>Cover Image <span class="required">*</span></label>
                                        </div>
                                        <div class="input-group form-group">
                                            <label class="btn btn-outline-primary">
                                                Upload Image
                                                <input type="file" id="inputImage" accept="image/jpeg,image/png"
                                                    style="display: none;">

                                                <input type="file" id="croppedCoverFile" name="cover_image" hidden>
                                            </label>
                                        </div>
                                        <div id="cover-preview-wrapper" class="image-cover-preview mt-3"
                                            @if (!$newsItem->cover_image_id) hidden @endif>
                                            <img id="cover_image" class="image-cover-preview_image"
                                                @if ($newsItem->cover_image_id) src="{{ url('image/show/' . $newsItem->cover_image_id) }}" @endif
                                                width="1280" height="720" alt="ตัวอย่างรูปปกข่าว">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Content <span class="required">*</span></label>
                                        <textarea class="form-control news-content-editor" name="content" id="content" rows="12">{{ old('content', $newsItem->content) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary btn-submit"
                                            style="width: 500px; max-width: 90%">Save</button>
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

        .image-cover-preview {
            width: 100%;
            max-width: 640px;
            overflow: hidden;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            background-color: #f8f9fa;
        }

        .image-cover-preview_image {
            display: block;
            width: 100%;
            height: auto;
        }
    </style>
    <script>
        $(document).ready(function() {
            tinymce.init({
                selector: '#content',
                height: 450,
                plugins: 'lists link image paste',
                toolbar: 'undo redo | formatselect | bold italic | bullist numlist | link image',
                automatic_uploads: true,
                paste_data_images: true,
                relative_urls: false,
                remove_script_host: true,

                images_upload_handler: function(blobInfo, success, failure) {
                    var formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());

                    fetch(@json(route('news.content-images.store')), {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                    '#news-form input[name="_token"]'
                                ).value
                            },
                            body: formData
                        })
                        .then(function(response) {
                            return response.json().then(function(data) {
                                if (!response.ok || typeof data.location !== 'string') {
                                    var errors = data.errors && data.errors.file;
                                    throw new Error(errors ? errors[0] :
                                        'อัปโหลดรูปไม่สำเร็จ');
                                }

                                return data.location;
                            });
                        })
                        .then(function(location) {
                            success(location);
                        })
                        .catch(function(error) {
                            failure(error.message || 'อัปโหลดรูปไม่สำเร็จ');
                        });
                }
            });

            var inputImage = document.getElementById('inputImage');
            var coverPreview = document.getElementById('cover_image');
            var croppedCoverFile = document.getElementById('croppedCoverFile');
            var coverPreviewUrl = null;
            var modalImage = document.getElementById('modalImage');
            var cropButton = document.getElementById('cropButton');
            var coverPreviewWrapper = document.getElementById('cover-preview-wrapper');
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
                        aspectRatio: 16 / 9,
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
                if (!cropper) {
                    return;
                }

                var canvas = cropper.getCroppedCanvas({
                    width: 1280,
                    height: 720,
                    fillColor: '#fff',
                    imageSmoothingQuality: 'high'
                });

                if (!canvas) {
                    return;
                }

                cropButton.disabled = true;

                canvas.toBlob(function(blob) {
                    cropButton.disabled = false;

                    if (!blob) {
                        Swal.fire('พบข้อผิดพลาด', 'ไม่สามารถสร้างรูปปกได้ กรุณาลองใหม่', 'error');
                        return;
                    }

                    var file = new File([blob], 'news-cover.jpg', {
                        type: 'image/jpeg'
                    });

                    var transfer = new DataTransfer();
                    transfer.items.add(file);
                    croppedCoverFile.files = transfer.files;

                    if (coverPreviewUrl) {
                        URL.revokeObjectURL(coverPreviewUrl);
                    }

                    coverPreviewUrl = URL.createObjectURL(file);
                    coverPreview.src = coverPreviewUrl;
                    coverPreviewWrapper.hidden = false;
                    cropModal.modal('hide');
                }, 'image/jpeg', 0.9);
            });

            // เพิ่มการจัดการเหตุการณ์สำหรับปุ่ม Zoom In
            document.getElementById('zoom-in-btn').addEventListener('click', function() {
                cropper.zoom(0.1);
            });

            // เพิ่มการจัดการเหตุการณ์สำหรับปุ่ม Zoom Out
            document.getElementById('zoom-out-btn').addEventListener('click', function() {
                cropper.zoom(-0.1);
            });

            // validate function
            $('#news-form').on('submit', function(event) {
                event.preventDefault();

                var form = this;
                var editor = tinymce.get('content');
                var saveButton = form.querySelector('.btn-submit');

                if (!$('#title').val().trim()) {
                    Swal.fire('พบข้อผิดพลาด', 'กรุณาระบุชื่อข่าวสาร', 'error');
                    return;
                }

                var hasExistingCover = form.dataset.hasCover === '1';
                var hasNewCover = croppedCoverFile.files.length > 0;

                if (!hasExistingCover && !hasNewCover) {
                    Swal.fire(
                        'พบข้อผิดพลาด',
                        'กรุณาใส่รูปปกก่อนเผยแพร่ข่าว',
                        'error'
                    );
                    return;
                }

                if (!editor || !editor.initialized) {
                    Swal.fire('พบข้อผิดพลาด', 'ตัวแก้ไขเนื้อหายังไม่พร้อม กรุณาลองอีกครั้ง', 'error');
                    return;
                }

                saveButton.disabled = true;

                editor.uploadImages(function() {
                    var images = editor.getBody().querySelectorAll('img');
                    var hasPendingImage = Array.from(images).some(function(image) {
                        return /^(blob:|data:)/i.test((image.getAttribute('src') || '')
                            .trim());
                    });

                    if (hasPendingImage) {
                        saveButton.disabled = false;
                        Swal.fire(
                            'พบข้อผิดพลาด',
                            'ยังมีรูปที่อัปโหลดไม่สำเร็จ กรุณาอัปโหลดใหม่หรือนำรูปนั้นออกก่อนบันทึก',
                            'error'
                        );
                        return;
                    }

                    editor.save(); // คัด HTML กลับลง textarea name="content"
                    form.submit(); // ส่งฟอร์มจริงโดยไม่เข้าตัวจัดการ submit ซ้ำ
                });
            });
        });
    </script>
@endsection
