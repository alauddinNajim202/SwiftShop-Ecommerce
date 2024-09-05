@extends('admin.layouts.app')

@section('title', 'Color Create | Swift Shop')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Color create </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Color</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">

                <form action="{{ route('color.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Color Name</label>
                        <input type="text" class="form-control text-dark"  id="color_name"
                            name="color_name" placeholder="Enter color name"
                            class="@error('color_name') is-invalid @enderror" value="{{ old('color_name') }}">

                        @error('color_name')
                            <div class="alert  alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="color_code">Color code</label>
                        <input type="color" class="form-control text-dark"  id="color_code"
                            name="color_code"
                            class="@error('color_code') is-invalid @enderror" value="{{ old('color_code') }}">

                        @error('color_code')
                            <div class="alert  alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option @if (old('status') == 0) selected @endif value="0">Active</option>
                            <option @if (old('status') == 1) selected @endif value="1">Inactive</option>
                        </select>
                    </div>






            </div>
            <div >
                <button type="submit" class="btn btn-outline-info btn-sm">Submit</button>
            </div>
        </form>


          </div>
        </div>
      </section>

@endsection


@section('scripts')
<script>
    $(function () {
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
