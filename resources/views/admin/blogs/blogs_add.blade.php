@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    {{-- Date Picker Bootstrap 4 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <style type="text/css">
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #b70000;
            font-weight: 700px;
        }
    </style>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Blog Page</h4>
                            <form method="post" action="{{ route('store.portfolio') }}" enctype="multipart/form-data">
                                @csrf

                                {{-- blog_category_id --}}
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Blog Category Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Blog Category Name" name="blog_category_id">
                                            <option selected="">Select Category</option>
                                            <option value="1">One</option>
                                        </select>
                                        @error('blog_category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- blog_title --}}
                                <div class="row mb-3">
                                    <label for="blog_title" class="col-sm-2 col-form-label">Blog Title</label>
                                    <div class="col-sm-10">
                                        <input name="blog_title" class="form-control" type="text" placeholder="Add title"
                                            id="blog_title">
                                        @error('blog_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- blog_tags --}}
                                <div class="row mb-3">
                                    <label for="blog_tags" class="col-sm-2 col-form-label">Blog Title</label>
                                    <div class="col-sm-10">
                                        <input name="blog_tags" value="home,tech" class="form-control" type="text"
                                            placeholder="Add tags" data-role="tagsinput">
                                        @error('blog_tags')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- blog_description --}}
                                <div class="row mb-3">
                                    <label for="blog_description" class="col-sm-2 col-form-label">Blog
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="blog_description" class="form-control" id="elm1">

                                            </textarea>
                                        @error('blog_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- blog_image --}}
                                <div class="row mb-3">
                                    <label for="blog_image" class="col-sm-2 col-form-label">Blog Image</label>
                                    <div class="col-sm-10">
                                        <input name="blog_image" class="form-control" type="file" id="image">
                                        @error('blog_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- display image --}}
                                <div class="row mb-3">
                                    <label for="display_blog_image" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" id="showImage"
                                            src="{{ url('upload/anonymous.png') }}" alt="Blog Image">
                                    </div>
                                </div>

                                {{-- submit --}}
                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Insert Blog Data">
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

    {{-- Date Picker Bootstrap 4 --}}
    <script type="text/javascript">
        $('.date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
        });
    </script>
@endsection
