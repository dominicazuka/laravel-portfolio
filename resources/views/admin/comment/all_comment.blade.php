@extends('admin.admin_master')
@section('admin')
@section('title', 'Blog Comments - Admin | Dominic Azuka Portfolio')
@section('description', 'View all comments on blog posts in the admin section of Dominic Azuka Portfolio.')
@section('og_description', 'View all comments on blog posts in the admin section of Dominic Azuka Portfolio.')
@section('twitter_description', 'View all comments on blog posts in the admin section of Dominic Azuka Portfolio.')

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Comment Messages</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Comment Messages</h4>

                            <table id="datatable" class="table table-bordered dt-responsive"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Post Name</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Comment</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php($i = 1)
                                    @foreach ($comments as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>
                                                {{ $item->blog->blog_title }}
                                            </td>
                                            <td>
                                                {{ $item->name }}
                                            </td>
                                            <td>
                                                {{ $item->email }}
                                            </td>
                                            <td>
                                                {{ $item->phone }}
                                            </td>
                                            <td>
                                                {{ $item->message }}
                                            </td>
                                            <td>
                                                {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                            </td>
                                            <td>
                                                <a href="{{ route('delete.comment', $item->id) }}"
                                                    class="btn btn-danger sm ml-2" title="Delete Comment" id="delete">
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
