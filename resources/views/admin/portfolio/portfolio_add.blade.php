@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Portfolio Page</h4>
                            <form method="post" action="{{ route('store.portfolio') }}" enctype="multipart/form-data">
                                @csrf

                                {{-- access ID --}}
                                <input type="hidden" name="id">

                                {{-- portfolio_name --}}
                                <div class="row mb-3">
                                    <label for="portfolio_name" class="col-sm-2 col-form-label">Portfolio Name</label>
                                    <div class="col-sm-10">
                                        <input name="portfolio_name" class="form-control" type="text"
                                            placeholder="Add Name" id="portfolio_name">
                                        @error('portfolio_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- portfolio_title --}}
                                <div class="row mb-3">
                                    <label for="portfolio_title" class="col-sm-2 col-form-label">Portfolio Title</label>
                                    <div class="col-sm-10">
                                        <input name="portfolio_title" class="form-control" type="text"
                                            placeholder="Add title" id="portfolio_title">
                                        @error('portfolio_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- portfolio_description --}}
                                <div class="row mb-3">
                                    <label for="portfolio_description" class="col-sm-2 col-form-label">Portfolio
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="portfolio_description" class="form-control" id="elm1">

                                            </textarea>
                                    </div>
                                </div>

                                {{-- portfolio_image --}}
                                <div class="row mb-3">
                                    <label for="portfolio_image" class="col-sm-2 col-form-label">Portfolio Image</label>
                                    <div class="col-sm-10">
                                        <input name="portfolio_image" class="form-control" type="file" id="image">
                                    </div>
                                </div>

                                {{-- display image --}}
                                <div class="row mb-3">
                                    <label for="display_portfolio_image" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" id="showImage"
                                            src="{{ url('upload/anonymous.png') }}" alt="Portfolio Image">
                                    </div>
                                </div>

                                {{-- submit --}}
                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Insert Portfolio Data">
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
