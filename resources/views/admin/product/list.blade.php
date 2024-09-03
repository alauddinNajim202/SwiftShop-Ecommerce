@extends('admin.layouts.app')

@section('title', 'Product List | Swift Shop')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product list </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <a href="{{route('product.create')}}" class="btn btn-block btn-outline-success btn-sm">Add New</a>
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
                        <th>Title  </th>
                        <th>Category </th>
                        <th> Sub Category </th>
                        <th>Brand  </th>
                        <th>Price  </th>
                        <th>Quantity </th>
                        <th>Short description </th>
                        <th>Created by</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                      @foreach ($products as $product)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->category_name }}</td>
                        <td>{{ $product->sub_category_name }}</td>
                        <td>{{ $product->brand_id }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->short_description }}</td>
                        <td>{{ $product->user_name}}</td>
                        <td>{!! $product->status == 0 ? "<span class='text-danger'>Active</span>" : 'Inactive' !!}</td>

                        <td class="text-center">
                          <a href="{{ route('product.edit', $product->id) }}" class="btn  btn-outline-warning btn-sm">Edit</a>
                          <a href="{{ route('product.delete', $product->id) }}" class="btn  btn-outline-danger btn-sm">Delete</a>
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
