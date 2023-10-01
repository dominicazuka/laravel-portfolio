@extends('admin.admin_master')
@section('admin')
@section('title', 'Change Password - Admin | Dominic Azuka Portfolio')
@section('description', 'Change your password in the admin section of Dominic Azuka Portfolio.')
@section('og_description', 'Change your password in the admin section of Dominic Azuka Portfolio.')
@section('twitter_description', 'Change your password in the admin section of Dominic Azuka Portfolio.')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Change Password Page</h4>
                            <br/>
                            <br/>

                            @if(count($errors))
                                @foreach ($errors->all() as $error)
                                <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                                @endforeach
                            @endif

                            <form method="post" action="{{ route('update.password') }}">
                                @csrf
                                {{-- old password --}}
                                <div class="row mb-3">
                                    <label for="oldpassword" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input name="oldpassword" class="form-control" type="password"
                                            placeholder="Old Password" id="oldpassword">
                                    </div>
                                </div>

                                {{-- new password --}}
                                <div class="row mb-3">
                                    <label for="newpassword" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input name="newpassword" class="form-control" type="password"
                                            placeholder="New Password" id="newpassword">
                                    </div>
                                </div>

                                {{-- Confirm password --}}
                                <div class="row mb-3">
                                    <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input name="confirm_password" class="form-control" type="password"
                                            placeholder="Confirm Password" id="confirm_password">
                                    </div>
                                </div>

                                {{-- submit --}}
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
