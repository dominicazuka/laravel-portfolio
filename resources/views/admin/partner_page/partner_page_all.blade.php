@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Partner Page</h4>
                            <form method="post" action="{{ route('update.partner') }}" enctype="multipart/form-data">
                                @csrf

                                {{-- access ID --}}
                                <input type="hidden" name="id" value="{{ $partner->id }}">
                                {{-- partner_title --}}
                                <div class="row mb-3">
                                    <label for="partner_title" class="col-sm-2 col-form-label">Edit Title</label>
                                    <div class="col-sm-10">
                                        <input name="partner_title" class="form-control" type="text"
                                            placeholder="Edit Title" id="partner_title"
                                            value="{{ $partner->partner_title }}">
                                        @error('partner_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                {{-- partner_description --}}
                                <div class="row mb-3">
                                    <label for="partner_description" class="col-sm-2 col-form-label">Edit
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="partner_description" class="form-control" id="elm1">
                                            {{ $partner->partner_description }}
                                            </textarea>
                                        @error('partner_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- submit --}}
                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Update Partner Data">
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
