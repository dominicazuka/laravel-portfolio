@extends('admin.admin_master')
@section('admin')
@section('title', 'Edit '.$testimonial->testimonial_name.' Testimonial - Admin | Dominic Azuka Portfolio')
@section('description', 'Edit a testimonial in the admin section of Dominic Azuka Portfolio.')
@section('og_description', 'Edit a testimonial in the admin section of Dominic Azuka Portfolio.')
@section('twitter_description', 'Edit a testimonial in the admin section of Dominic Azuka Portfolio.')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Testimonial Page</h4>
                            <br />
                            <form method="post" action="{{ route('update.testimonial') }}" enctype="multipart/form-data">
                                @csrf

                                {{-- access ID --}}
                                <input type="hidden" name="id" value="{{ $testimonial->id }}">

                                {{-- testimonial_name --}}
                                <div class="row mb-3">
                                    <label for="testimonial_name" class="col-sm-2 col-form-label">Edit Testimonial Name</label>
                                    <div class="col-sm-10">
                                        <input name="testimonial_name" class="form-control" type="text"
                                            placeholder="Edit Name" id="testimonial_name"
                                            value="{{ $testimonial->testimonial_name }}">
                                        @error('testimonial_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                 {{-- testimonial_image --}}
                                 <div class="row mb-3">
                                    <label for="testimonial_image" class="col-sm-2 col-form-label">Edit Testimonial
                                        Image</label>
                                    <div class="col-sm-10">
                                        <input name="testimonial_image" class="form-control" type="file" id="image">
                                        @error('testimonial_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- display image --}}
                                <div class="row mb-3">
                                    <label for="display_testimonial_image" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" id="showImage"
                                            src="{{ asset($testimonial->testimonial_image) }}" alt="Testimonial Image">
                                    </div>
                                </div>

                                {{-- testimonial_description --}}
                                <div class="row mb-3">
                                    <label for="testimonial_description" class="col-sm-2 col-form-label">Edit Testimonial
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="testimonial_description" class="form-control" id="elm1">
                                                {{ $testimonial->testimonial_description }}
                                            </textarea>
                                        @error('testimonial_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- submit --}}
                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Update Testimonial Data">
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
