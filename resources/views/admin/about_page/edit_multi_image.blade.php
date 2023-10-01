@extends('admin.admin_master')
@section('admin')
@section('title', 'Edit About Images - Admin | Dominic Azuka Portfolio')
@section('description', 'Edit multi images in the About section on the home page of Dominic Azuka Portfolio.')
@section('og_description', 'Edit multi images in the About section on the home page of Dominic Azuka Portfolio.')
@section('twitter_description', 'Edit multi images in the About section on the home page of Dominic Azuka Portfolio.')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Update Image</h4>
                            <br />
                            <br />
                            <form method="post" action="{{ route('update.multi.image') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $multiImage->id }}" />
                                {{-- multi image --}}
                                <div class="row mb-3">
                                    <label for="multi_image" class="col-sm-2 col-form-label">About Multi Image</label>
                                    <div class="col-sm-10">
                                        <input name="multi_image" class="form-control" type="file" id="image">
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
                                            src="{{ asset($multiImage->multi_image) }}" alt="Update Multi Image">
                                    </div>
                                </div>

                                {{-- submit --}}
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Image">
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    {{-- <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e) {
                $('#imagePreviewContainer').empty(); //clear previous images
                for (var i = 0; i < e.target.files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var img = $('<img>').addClass('rounded avatar-lg ml-3');
                        img.attr('src', e.target.result);
                        img.attr('alt', 'About Multi Image');
                        $('#imagePreviewContainer').append(img);
                    }
                    reader.readAsDataURL(e.target.files[i]);
                }
            });
        });
    </script> --}}
@endsection
