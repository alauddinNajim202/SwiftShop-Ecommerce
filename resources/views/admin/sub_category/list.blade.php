@extends('admin.layouts.app')

@section('title', 'Category List | Swift Shop')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sub Category list </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <a href="{{route('sub_category.create')}}" class="btn btn-block btn-outline-success btn-sm">Add New</a>
                        </li>
                    </ol>
                </div>

            </div>
            @include('admin.layouts._message')
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">

                <div class="card-body">
                  <table class="table table-bordered ">
                    <thead>
                      <tr>
                        <th>SL</th>
                        <th>Category </th>
                        <th>Sub Category </th>
                        <th>Category slug</th>
                        <th>Meta title </th>
                        <th>Created by</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                      @foreach ($sub_categories as $sub_category)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $sub_category->category_name }}</td>
                        <td>{{ $sub_category->name }}</td>
                        <td>{{ $sub_category->slug }}</td>
                        <td>{{ $sub_category->meta_title }}</td>
                        <td>{{ $sub_category->user_name }}</td>
                        <td>{!! $sub_category->status == 0 ? "<span class='text-danger'>Active</span>" : 'Inactive' !!}</td>

                        <td class="text-center">
                          <a href="{{ route('sub_category.edit', $sub_category->id) }}" class="btn  btn-outline-warning btn-sm">Edit</a>
                          <a href="{{ route('sub_category.delete', $sub_category->id) }}" class="btn  btn-outline-danger btn-sm">Delete</a>
                        </td>


                      <tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>

            </div>

          </div>
        </div>
      </section>

@endsection

@section('scripts')

@endsection
