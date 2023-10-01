@extends('admin.admin_master')
@section('admin')
@section('title', 'Edit '.$blog_category->blog_category.' Blog Category - Admin | Dominic Azuka Portfolio')
@section('description', 'Edit a blog category in the admin section of Dominic Azuka Portfolio.')
@section('og_description', 'Edit a blog category in the admin section of Dominic Azuka Portfolio.')
@section('twitter_description', 'Edit a blog category in the admin section of Dominic Azuka Portfolio.')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Blog Category Page</h4>
                            <br />
                            <br />
                            <form method="post" action="{{ route('update.blog.category', $blog_category->id) }}">
                                @csrf

                                {{-- blog_category --}}
                                <div class="row mb-3">
                                    <label for="blog_category" class="col-sm-2 col-form-label">Blog Category Name</label>
                                    <div class="col-sm-10">
                                        <input name="blog_category" class="form-control" type="text"
                                            placeholder="Edit Blog Category Name" id="blog_category"
                                            value={{ $blog_category->blog_category }}>
                                        @error('blog_category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- submit --}}
                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Update Blog Category">
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
