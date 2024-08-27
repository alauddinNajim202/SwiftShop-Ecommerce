@extends('admin.layouts.app')

@section('title', 'Admin Update | Swift Shop')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin update </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Admin update</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content ">
        <div class="container-fluid ">
            <div class="row">

                <div class="col-md-6">

                    <div class="card card-primary">

                        <form action="{{ route('admin.update', $user->id) }}" method="POST">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control text-dark" id="name" name="name"
                                        placeholder="Enter name" value="{{ $user->name }}"
                                        class="@error('name') is-invalid @enderror">

                                        @error('name')
                                            <div class="alert  alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="name" name="email"
                                        placeholder="Enter email" value="{{ $user->email }}"  class="@error('email') is-invalid @enderror">

                                    @error('email')
                                        <div class="alert  alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" name="password"
                                        placeholder="Enter password">
                                        <span>
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                Leave blank if you don't want to change it.
                                            </small>
                                        </span>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option @if ($user->status == 0) selected @endif value="0">Active</option>
                                        <option @if ($user->status == 1) selected @endif value="1">Inactive</option>
                                    </select>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-outline-info btn-sm">Update</button>
                                </div>
                        </form>
                    </div>


                </div>


            </div>

        </div>
    </section>

@endsection

@section('scripts')

@endsection
