@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Service Page</h4>
                            <br />
                            <br />
                            <form method="post" action="{{ route('update.service') }}" enctype="multipart/form-data">
                                @csrf

                                {{-- access ID --}}
                                <input type="hidden" name="id" value="{{ $service->id }}">

                                {{-- service_image --}}
                                <div class="row mb-3">
                                    <label for="service_image" class="col-sm-2 col-form-label">Edit Service
                                        Image</label>
                                    <div class="col-sm-10">
                                        <input name="service_image" class="form-control" type="file" id="image">
                                        @error('service_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- display image --}}
                                <div class="row mb-3">
                                    <label for="display_portfolio_image" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" id="showImage"
                                            src="{{ asset($service->service_image) }}" alt="Service Image">
                                    </div>
                                </div>

                                {{-- service_icon --}}
                                <div class="row mb-3">
                                    <label for="service_icon" class="col-sm-2 col-form-label">Edit Service
                                        Icon</label>
                                    <div class="col-sm-10">
                                        <input name="service_icon" class="form-control" type="file" id="serviceIcon">
                                        @error('service_icon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- display icon --}}
                                <div class="row mb-3">
                                    <label for="display_service_icon" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" id="showIcon"
                                            src="{{ asset($service->service_icon) }}" alt="Service Icon">
                                    </div>
                                </div>

                                {{-- service_title --}}
                                <div class="row mb-3">
                                    <label for="service_title" class="col-sm-2 col-form-label">Edit Service
                                        Title</label>
                                    <div class="col-sm-10">
                                        <input name="service_title" class="form-control" type="text"
                                            placeholder="Edit title" id="service_title"
                                            value="{{ $service->service_title }}">
                                        @error('service_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- service_description --}}
                                <div class="row mb-3">
                                    <label for="service_description" class="col-sm-2 col-form-label">Edit Portfolio
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="service_description" class="form-control" id="elm1">
                                                {{ $service->service_description }}
                                            </textarea>
                                        @error('service_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- submit --}}
                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Update Service Data">
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
