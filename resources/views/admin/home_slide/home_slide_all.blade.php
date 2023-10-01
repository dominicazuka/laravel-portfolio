@extends('admin.admin_master')
@section('admin')
@section('title', 'Home Slider - Admin | Dominic Azuka Portfolio')
@section('description', 'Edit home slider details on the homepage in the admin section of Dominic Azuka Portfolio.')
@section('og_description', 'Edit home slider details on the homepage in the admin section of Dominic Azuka Portfolio.')
@section('twitter_description', 'Edit home slider details on the homepage in the admin section of Dominic Azuka Portfolio.')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Home Slide Page</h4>
                            <form method="post" action="{{ route('update.slider') }}" enctype="multipart/form-data">
                                @csrf

                                {{-- access ID --}}
                                <input type="hidden" name="id" value="{{ $homeslide->id }}">

                                {{-- title --}}
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input name="title" class="form-control" type="text" placeholder="Edit Title"
                                            value="{{ $homeslide->title }}" id="title">
                                    </div>
                                </div>

                                {{-- short_title --}}
                                <div class="row mb-3">
                                    <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                                    <div class="col-sm-10">
                                        <input name="short_title" class="form-control" type="text" placeholder="Edit email"
                                            value="{{ $homeslide->short_title }}" id="short_title">
                                    </div>
                                </div>

                                {{-- video_url --}}
                                <div class="row mb-3">
                                    <label for="video_url" class="col-sm-2 col-form-label">Video URL</label>
                                    <div class="col-sm-10">
                                        <input name="video_url" class="form-control" type="text"
                                            placeholder="Edit Video URL" value="{{ $homeslide->video_url }}" id="video_url">
                                    </div>
                                </div>

                                {{-- slider image --}}
                                <div class="row mb-3">
                                    <label for="home_slide" class="col-sm-2 col-form-label">Slider Image</label>
                                    <div class="col-sm-10">
                                        <input name="home_slide" class="form-control" type="file" id="image">
                                    </div>
                                </div>

                                {{-- display image --}}
                                <div class="row mb-3">
                                    <label for="profile_image" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" id="showImage"
                                            src="{{ !empty($homeslide->home_slide) ? url($homeslide->home_slide) : url('upload/anonymous.png') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>

                                {{-- submit --}}
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Slide">
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
