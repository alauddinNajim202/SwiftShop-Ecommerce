@extends('admin.layouts.app')

@section('title', 'Color List | Swift Shop')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Color list </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <a href="{{route('color.create')}}" class="btn btn-block btn-outline-success btn-sm">Add New</a>
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
                        <th>Color Name </th>
                        <th>Color code </th>
                        <th>Created by</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                      @foreach ($colors as $color)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>
                            {{ $color->color_name }}
                            <span style="display:inline-block; width:20px; height:12px; background-color:{{ $color->color_code }}; margin-left:10px; border:1px solid #000; margin-top:5px;"></span>
                        </td>
                        </td>
                        <td>{{ $color->color_code }}</td>

                        <td>{{ $color->user_name}}</td>
                        <td>{!! $color->status == 0 ? "<span class='text-danger'>Active</span>" : 'Inactive' !!}</td>

                        <td class="text-center">
                          <a href="{{ route('color.edit', $color->id) }}" class="btn  btn-outline-warning btn-sm">Edit</a>
                          <a href="{{ route('color.delete', $color->id) }}" class="btn  btn-outline-danger btn-sm">Delete</a>
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
