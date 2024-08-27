@extends('admin.layouts.app')

@section('title', 'Admin Create | Swift Shop')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sub Category create </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Sub category create</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('sub_category.store') }}" method="post">
            <div class="row">
                <div class="col-lg-12">
                    <div style="float: left" class="col-lg-6">
                            @csrf
                            <div class="form-group">
                                <label for="name">Sub Category Name</label>
                                <input type="text" class="form-control text-dark" id="name" name="name"
                                    placeholder="Enter name" class="@error('name') is-invalid @enderror"
                                    value="{{ old('name') }}">

                                @error('name')
                                    <div class="alert  alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category_id">Category </label>
                                <select class="form-control" name="category_id" id="category_id">
                                    <option value="">Select</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert  alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Slug</label>
                                <input type="text" class="form-control text-dark" id="slug" name="slug"
                                    placeholder="Enter slug" class="@error('slug') is-invalid @enderror"
                                    value="{{ old('slug') }}">

                                @error('slug')
                                    <div class="alert  alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option @if (old('status') == 0) selected @endif value="0">Active</option>
                                    <option @if (old('status') == 1) selected @endif value="1">Inactive
                                    </option>
                                </select>
                            </div>



                    </div>

                    <div style="float: right" class="col-lg-6">

                        <div class="form-group">
                            <label for="action_date">Date </label>
                            <input type="date" class="form-control text-dark" id="action_date" name="action_date"
                                placeholder="" class="@error('action_date') is-invalid @enderror"
                                value="{{ old('action_date') }}">

                            @error('action_date')
                                <div class="alert  alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Meta title </label>
                            <input type="text" class="form-control text-dark" id="meta_title" name="meta_title"
                                placeholder="Enter meta title" class="@error('meta_title') is-invalid @enderror"
                                value="{{ old('meta_title') }}">

                            @error('meta_title')
                                <div class="alert  alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Meta icon </label>
                            <input type="text" class="form-control text-dark" id="meta_icon" name="meta_icon"
                                placeholder="Enter meta title" class="@error('meta_icon') is-invalid @enderror"
                                value="{{ old('meta_icon') }}">

                            @error('meta_icon')
                                <div class="alert  alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name"> Sorting </label>
                            <input type="text" class="form-control text-dark" id="order_level" name="order_level"
                                placeholder="Enter number" class="@error('order_level') is-invalid @enderror"
                                value="{{ old('order_level') }}">

                            @error('order_level')
                                <div class="alert  alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>

                    <div class="form-group">
                        <label for="name">Meta keyword </label> <br>
                        <textarea class="form-control" name="meta_keyword" id="summernote1" cols="147%" rows="10">
                        {{ old('meta_keyword') }}
                    </textarea>
                    </div>

                    <div class="form-group">
                        <label for="name">Meta description </label> <br>
                        <textarea id="summernote2" class="form-control" name="meta_description" id="" cols="147%"
                            rows="10">
                        {{ old('meta_description') }}
                    </textarea>
                    </div>

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
    <script>
        //   $("#action_date").datepicker({
        //         dateFormat: "dd-mm-yy",
        //         changeMonth: true,
        //         changeYear: true,
        //         showButtonPanel: true
        //     });
        $(function() {
            // Summernote
            $('#summernote1, #summernote2').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
@endsection