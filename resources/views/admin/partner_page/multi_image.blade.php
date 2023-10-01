@extends('admin.admin_master')
@section('admin')
@section('title', 'Upload Partner Images - Admin | Dominic Azuka Portfolio')
@section('description', 'Upload partner multi images sitewide in the admin section of Dominic Azuka Portfolio.')
@section('og_description', 'Upload partner multi images sitewide in the admin section of Dominic Azuka Portfolio.')
@section('twitter_description', 'Upload partner multi images sitewide in the admin section of Dominic Azuka Portfolio.')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Partner Multi-Image</h4>
                            <br />
                            <br />
                            <form method="post" action="{{ route('store.partner.multi.image') }}"
                                enctype="multipart/form-data" id="multiImageForm">
                                @csrf

                                {{-- multi image --}}
                                <div class="row mb-3">
                                    <label for="multi_image" class="col-sm-2 col-form-label">Partner Multi Image</label>
                                    <div class="col-sm-10">
                                        <input name="multi_image[]" class="form-control" type="file" id="image"
                                            multiple="" accept=".jpg, .png, .gif, .webp">
                                        {{--  <!-- Display client error message -->  --}}
                                        <div id="fileError" class="text-danger"></div>
                                        @error('multi_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- display image --}}
                                <div class="row mb-3">
                                    <label for="display_multi_image" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10" id="imagePreviewContainer">
                                        <img class="rounded avatar-lg" id="showImage"
                                            src="{{ url('upload/anonymous.png') }}" alt="About Multi Image">
                                    </div>
                                </div>

                                {{-- submit --}}
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Multi Image">
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#multiImageForm').submit(function(e) {
                // Reset the previous error message
                $('#fileError').text('');

                // Get the selected file
                var selectedFile = $('#image')[0].files[0];

                // Check if a file is selected
                if (!selectedFile) {
                    e.preventDefault(); // Prevent form submission
                    $('#fileError').text('An image is required');
                } else {
                    // Check file type
                    var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                    if (allowedTypes.indexOf(selectedFile.type) === -1) {
                        e.preventDefault(); // Prevent form submission
                        $('#fileError').text('Invalid image format');
                    }

                    // Check file size
                    if (selectedFile.size > 2048000) { // 2MB in bytes
                        e.preventDefault(); // Prevent form submission
                        $('#fileError').text('Images size cannot exceed 2MB');
                    }
                }
            });

            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endsection
