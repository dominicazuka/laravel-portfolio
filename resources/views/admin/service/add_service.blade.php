@extends('admin.admin_master')
@section('admin')
@section('title', 'Add Service - Admin | Dominic Azuka Portfolio')
@section('description', 'Add a new service in the admin section of Dominic Azuka Portfolio.')
@section('og_description', 'Add a new service in the admin section of Dominic Azuka Portfolio.')
@section('twitter_description', 'Add a new service in the admin section of Dominic Azuka Portfolio.')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Service Page</h4><br />
                            <form method="post" action="{{ route('store.service') }}" enctype="multipart/form-data">
                                @csrf

                                {{-- service_image --}}
                                <div class="row mb-3">
                                    <label for="service_image" class="col-sm-2 col-form-label">Service Image</label>
                                    <div class="col-sm-10">
                                        <input name="service_image" class="form-control" type="file" id="image">
                                        @error('service_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- display service image --}}
                                <div class="row mb-3">
                                    <label for="display_blog_image" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" id="showImage"
                                            src="{{ url('upload/anonymous.png') }}" alt="Service Image">
                                    </div>
                                </div>

                                {{-- service_icon --}}
                                <div class="row mb-3">
                                    <label for="service_icon" class="col-sm-2 col-form-label">Service Icon</label>
                                    <div class="col-sm-10">
                                        <input name="service_icon" class="form-control" type="file" id="serviceIcon">
                                        @error('service_icon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- display service icon --}}
                                <div class="row mb-3">
                                    <label for="display_blog_image" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" id="showIcon"
                                            src="{{ url('upload/anonymous.png') }}" alt="Service Icon">
                                    </div>
                                </div>

                                {{-- service_title --}}
                                <div class="row mb-3">
                                    <label for="service_title" class="col-sm-2 col-form-label">Service Title</label>
                                    <div class="col-sm-10">
                                        <input name="service_title" class="form-control" type="text"
                                            placeholder="Add Service title" id="service_title">
                                        @error('service_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- service_description --}}
                                <div class="row mb-3">
                                    <label for="service_description" class="col-sm-2 col-form-label">Service
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="service_description" class="form-control" id="elm1">

                                            </textarea>
                                        @error('service_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                {{-- submit --}}
                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Insert Service Data">
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#serviceIcon').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showIcon').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
