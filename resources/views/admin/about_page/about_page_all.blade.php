@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">About Page</h4>
                            <form method="post" action="{{ route('update.about') }}" enctype="multipart/form-data">
                                @csrf

                                {{-- access ID --}}
                                <input type="hidden" name="id" value="{{ $aboutpage->id }}">

                                {{-- title --}}
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input name="title" class="form-control" type="text" placeholder="Edit Title"
                                            value="{{ $aboutpage->title }}" id="title">
                                    </div>
                                </div>

                                {{-- short_title --}}
                                <div class="row mb-3">
                                    <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                                    <div class="col-sm-10">
                                        <input name="short_title" class="form-control" type="text"
                                            placeholder="Edit email" value="{{ $aboutpage->short_title }}" id="short_title">
                                    </div>
                                </div>

                                {{-- short_description --}}
                                <div class="row mb-3">
                                    <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                                    <div class="col-sm-10">
                                        <textarea required="" class="form-control" rows="5" name="short_description" class="form-control">
                                               {{ $aboutpage->short_description }}
                                            </textarea>
                                    </div>
                                </div>

                                {{-- long_description --}}
                                <div class="row mb-3">
                                    <label for="long_description" class="col-sm-2 col-form-label">Long Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="long_description" class="form-control" id="elm1">
                                                {{ $aboutpage->long_description }}
                                            </textarea>
                                    </div>
                                </div>

                                {{-- slider image --}}
                                <div class="row mb-3">
                                    <label for="about_image" class="col-sm-2 col-form-label">About Image</label>
                                    <div class="col-sm-10">
                                        <input name="about_image" class="form-control" type="file" id="image">
                                    </div>
                                </div>

                                {{-- display image --}}
                                <div class="row mb-3">
                                    <label for="profile_image" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" id="showImage"
                                            src="{{ !empty($aboutpage->about_image) ? url($aboutpage->about_image) : url('upload/anonymous.png') }}"
                                            alt="About Image">
                                    </div>
                                </div>

                                {{-- submit --}}
                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Update About Page">
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
@endsection
