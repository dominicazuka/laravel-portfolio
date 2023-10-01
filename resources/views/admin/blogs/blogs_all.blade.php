@extends('admin.admin_master')
@section('admin')
@section('title', 'All Blogs or Articles - Admin | Dominic Azuka Portfolio')
@section('description', 'View all blogs or articles in the admin section of Dominic Azuka Portfolio.')
@section('og_description', 'View all blogs or articles in the admin section of Dominic Azuka Portfolio.')
@section('twitter_description', 'View all blogs or articles in the admin section of Dominic Azuka Portfolio.')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Blog Data</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Blog Data</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Blog Category</th>
                                        <th>Blog Title</th>
                                        <th>Blog Tags</th>
                                        <th>Blog Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php($i = 1)
                                    @foreach ($blogs as $key => $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item['category']['blog_category'] }}</td>
                                            <td>{{ $item->blog_title }}</td>
                                            <td>{{ $item->blog_tags }}</td>
                                            <td>
                                                <img src="{{ asset($item->blog_image) }}"
                                                    style="width:60px; height:60px;" />
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.blog', $item->id) }}" class="btn btn-info sm"
                                                    title="Edit Blog Post">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('delete.blog', $item->id) }}"
                                                    class="btn btn-danger sm ml-2" title="Delete Blog Post" id="delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
