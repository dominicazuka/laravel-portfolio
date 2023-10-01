@extends('admin.admin_master')
@section('admin')
@section('title', 'All Testimonials - Admin | Dominic Azuka Portfolio')
@section('description', 'View all testimonials in the admin section of Dominic Azuka Portfolio.')
@section('og_description', 'View all testimonials in the admin section of Dominic Azuka Portfolio.')
@section('twitter_description', 'View all testimonials in the admin section of Dominic Azuka Portfolio.')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Testimonial Data</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Testimonial Data</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Testimonial Name</th>
                                        <th>Testimonial Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php($i = 1)
                                    @foreach ($testimonial as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->testimonial_name }}</td>
                                            <td>
                                                <img src="{{ asset($item->testimonial_image) }}"
                                                    style="width:60px; height:60px;" />
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.testimonial', $item->id) }}" class="btn btn-info sm"
                                                    title="Edit Testimonial">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('delete.testimonial', $item->id) }}"
                                                    class="btn btn-danger sm ml-2" title="Delete Testimonial" id="delete">
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
