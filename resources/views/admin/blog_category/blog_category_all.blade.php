@extends('admin.admin_master')
@section('admin')
@section('title', 'All Blog Categories - Admin | Dominic Azuka Portfolio')
@section('description', 'View all blog categories in the admin section of Dominic Azuka Portfolio.')
@section('og_description', 'View all blog categories in the admin section of Dominic Azuka Portfolio.')
@section('twitter_description', 'View all blog categories in the admin section of Dominic Azuka Portfolio.')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Blog Category</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Blog Category Data</h4>
                            <br />

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Blog Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php($i = 1)
                                    @foreach ($blog_category as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->blog_category }}</td>
                                            <td>
                                                <a href="{{ route('edit.blog.category', $item->id) }}"
                                                    class="btn btn-info sm" title="Edit Blog Category">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('delete.blog.category', $item->id) }}"
                                                    class="btn btn-danger sm ml-2" title="Delete Blog Category"
                                                    id="delete">
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
