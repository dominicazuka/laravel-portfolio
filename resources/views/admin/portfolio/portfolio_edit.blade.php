@extends('admin.admin_master')
@section('admin')
@section('title', 'Edit '.$portfolio->portfolio_name.' Portfolio - Admin | Dominic Azuka Portfolio')
@section('description', 'Edit a portfolio item in the admin section of Dominic Azuka Portfolio.')
@section('og_description', 'Edit a portfolio item in the admin section of Dominic Azuka Portfolio.')
@section('twitter_description', 'Edit a portfolio item in the admin section of Dominic Azuka Portfolio.')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    {{-- Date Picker Bootstrap 4 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Portfolio Page</h4>
                            <br />
                            <br />
                            <form method="post" action="{{ route('update.portfolio') }}" enctype="multipart/form-data">
                                @csrf

                                {{-- access ID --}}
                                <input type="hidden" name="id" value="{{ $portfolio->id }}">

                                {{-- portfolio_name --}}
                                <div class="row mb-3">
                                    <label for="portfolio_name" class="col-sm-2 col-form-label">Edit Portfolio Name</label>
                                    <div class="col-sm-10">
                                        <input name="portfolio_name" class="form-control" type="text"
                                            placeholder="Edit Name" id="portfolio_name"
                                            value="{{ $portfolio->portfolio_name }}">
                                        @error('portfolio_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- portfolio_title --}}
                                <div class="row mb-3">
                                    <label for="portfolio_title" class="col-sm-2 col-form-label">Edit Portfolio
                                        Title</label>
                                    <div class="col-sm-10">
                                        <input name="portfolio_title" class="form-control" type="text"
                                            placeholder="Edit title" id="portfolio_title"
                                            value="{{ $portfolio->portfolio_title }}">
                                        @error('portfolio_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- portfolio_description --}}
                                <div class="row mb-3">
                                    <label for="portfolio_description" class="col-sm-2 col-form-label">Edit Portfolio
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="portfolio_description" class="form-control" id="elm1">
                                                {{ $portfolio->portfolio_description }}
                                            </textarea>
                                        @error('portfolio_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- portfolio_image --}}
                                <div class="row mb-3">
                                    <label for="portfolio_image" class="col-sm-2 col-form-label">Edit Portfolio
                                        Image</label>
                                    <div class="col-sm-10">
                                        <input name="portfolio_image" class="form-control" type="file" id="image">
                                        @error('portfolio_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- display image --}}
                                <div class="row mb-3">
                                    <label for="display_portfolio_image" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" id="showImage"
                                            src="{{ asset($portfolio->portfolio_image) }}" alt="Portfolio Image">
                                    </div>
                                </div>

                                {{-- portfolio_date --}}
                                <div class="row mb-3">
                                    <label for="portfolio_date" class="col-sm-2 col-form-label">Edit Portfolio
                                        Date</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class="date form-control" name="portfolio_date"
                                            placeholder="Click to add date" value="{{ $portfolio->portfolio_date }}" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                        @error('portfolio_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- portfolio_location --}}
                                <div class="row mb-3">
                                    <label for="portfolio_location" class="col-sm-2 col-form-label">Edit Portfolio
                                        Location</label>
                                    <div class="col-sm-10">
                                        <input name="portfolio_location" class="form-control" type="text"
                                            placeholder="Edit location" id="portfolio_location"
                                            value="{{ $portfolio->portfolio_location }}">
                                        @error('portfolio_location')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- portfolio_client --}}
                                <div class="row mb-3">
                                    <label for="portfolio_client" class="col-sm-2 col-form-label">Edit Portfolio
                                        Client</label>
                                    <div class="col-sm-10">
                                        <input name="portfolio_client" class="form-control" type="text"
                                            placeholder="Edit client" id="portfolio_client"
                                            value="{{ $portfolio->portfolio_client }}">
                                        @error('portfolio_client')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- portfolio_category --}}
                                <div class="row mb-3">
                                    <label for="portfolio_category" class="col-sm-2 col-form-label">Edit Portfolio
                                        Category</label>
                                    <div class="col-sm-10">
                                        <input name="portfolio_category" class="form-control" type="text"
                                            placeholder="Edit category" id="portfolio_category"
                                            value="{{ $portfolio->portfolio_category }}">
                                        @error('portfolio_category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- portfolio_link --}}
                                <div class="row mb-3">
                                    <label for="portfolio_link" class="col-sm-2 col-form-label">Edit Portfolio
                                        Location</label>
                                    <div class="col-sm-10">
                                        <input name="portfolio_link" class="form-control" type="text"
                                            placeholder="Edit link" id="portfolio_link"
                                            value="{{ $portfolio->portfolio_link }}">
                                        @error('portfolio_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- submit --}}
                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Update Portfolio Data">
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
