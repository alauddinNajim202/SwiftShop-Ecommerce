@extends('admin.layouts.app')

@section('title', 'Admin Create | Swift Shop')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin create </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Admin create</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content ">
        <div class="container-fluid ">
            <div class="row">

                <div class="col-md-6">



                        <form action="{{ route('admin.store') }}" method="POST">
                            @csrf


                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control text-dark"  id="name"
                                        name="name" placeholder="Enter name"
                                        class="@error('name') is-invalid @enderror" value="{{ old('name') }}">

                                    @error('name')
                                        <div class="alert  alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="name" name="email"
                                        placeholder="Enter email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}">

                                        @error('email')
                                        <div class="alert  alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" name="password"
                                        placeholder="Enter password">
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option @if (old('status') == 0) selected @endif value="0">Active</option>
                                        <option @if (old('status') == 1) selected @endif value="1">Inactive</option>
                                    </select>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-outline-info btn-sm">Submit</button>
                                </div>
                        </form>



            </div>

        </div>
    </section>

@endsection

@section('scripts')

@endsection
