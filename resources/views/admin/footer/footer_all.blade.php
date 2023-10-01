@extends('admin.admin_master')
@section('admin')
@section('title', 'Footer Details - Admin | Dominic Azuka Portfolio')
@section('description', 'Edit footer details sitewide in the admin section of Dominic Azuka Portfolio.')
@section('og_description', 'Edit footer details sitewide in the admin section of Dominic Azuka Portfolio.')
@section('twitter_description', 'Edit footer details sitewide in the admin section of Dominic Azuka Portfolio.')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Footer Page</h4>
                            <form method="post" action="{{ route('update.footer') }}">
                                @csrf

                                {{-- access ID --}}
                                <input type="hidden" name="id" value="{{ $allFooter->id }}">

                                {{-- number --}}
                                <div class="row mb-3">
                                    <label for="number" class="col-sm-2 col-form-label">Number</label>
                                    <div class="col-sm-10">
                                        <input name="number" class="form-control" type="text" placeholder="Edit Number"
                                            value="{{ $allFooter->number }}" id="text">
                                        @error('number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- short_description --}}
                                <div class="row mb-3">
                                    <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="short_description" class="form-control" id="elm1">
                                                {{ $allFooter->short_description }}
                                            </textarea>
                                        @error('short_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- address --}}
                                <div class="row mb-3">
                                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input name="address" class="form-control" type="text" placeholder="Edit Address"
                                            value="{{ $allFooter->address }}" id="address">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- email --}}
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input name="email" class="form-control" type="text" placeholder="Edit Email"
                                            value="{{ $allFooter->email }}" id="email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- facebook --}}
                                <div class="row mb-3">
                                    <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                                    <div class="col-sm-10">
                                        <input name="facebook" class="form-control" type="text"
                                            placeholder="Edit Facebook" value="{{ $allFooter->facebook }}" id="facebook">
                                        @error('facebook')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- twitter --}}
                                <div class="row mb-3">
                                    <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                                    <div class="col-sm-10">
                                        <input name="twitter" class="form-control" type="text" placeholder="Edit Twitter"
                                            value="{{ $allFooter->twitter }}" id="twitter">
                                        @error('twitter')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- linkedin --}}
                                <div class="row mb-3">
                                    <label for="linkedin" class="col-sm-2 col-form-label">LinkedIn</label>
                                    <div class="col-sm-10">
                                        <input name="linkedin" class="form-control" type="text"
                                            placeholder="Edit LinkedIn" value="{{ $allFooter->linkedin }}" id="linkedin">
                                        @error('linkedin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- youtube --}}
                                <div class="row mb-3">
                                    <label for="youtube" class="col-sm-2 col-form-label">Youtube</label>
                                    <div class="col-sm-10">
                                        <input name="youtube" class="form-control" type="text" placeholder="Edit Youtube"
                                            value="{{ $allFooter->youtube }}" id="youtube">
                                        @error('youtube')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- instagram --}}
                                <div class="row mb-3">
                                    <label for="instagram" class="col-sm-2 col-form-label">Youtube</label>
                                    <div class="col-sm-10">
                                        <input name="instagram" class="form-control" type="text"
                                            placeholder="Edit Youtube" value="{{ $allFooter->instagram }}"
                                            id="instagram">
                                        @error('instagram')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- github --}}
                                <div class="row mb-3">
                                    <label for="github" class="col-sm-2 col-form-label">Github</label>
                                    <div class="col-sm-10">
                                        <input name="github" class="form-control" type="text"
                                            placeholder="Edit Github" value="{{ $allFooter->github }}" id="github">
                                        @error('github')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- copyright --}}
                                <div class="row mb-3">
                                    <label for="copyright" class="col-sm-2 col-form-label">Copyright</label>
                                    <div class="col-sm-10">
                                        <input name="copyright" class="form-control" type="text"
                                            placeholder="Edit Copyright" value="{{ $allFooter->copyright }}"
                                            id="copyright">
                                        @error('copyright')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- submit --}}
                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Update Footer Section">
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
