@extends('admin.layouts.app')

@section('title', 'Admin List | Swift Shop')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin list </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <a href="{{route('admin.create')}}" class="btn btn-block btn-outline-success btn-sm">Add New</a>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                      @foreach ($users as $user)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{!! $user->status == 0 ? "<span class='text-danger'>Active</span>" : 'Inactive' !!}</td>

                        <td class="text-center">
                          <a href="{{ route('admin.edit', $user->id) }}" class="btn  btn-outline-warning btn-sm">Edit</a>
                          <a href="{{ route('admin.delete', $user->id) }}" class="btn  btn-outline-danger btn-sm">Delete</a>
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
