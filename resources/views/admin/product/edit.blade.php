@extends('admin.layouts.app')

@section('title', 'Product Update | Swift Shop')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Update </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">product </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">

                <form action="{{ route('product.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Product title</label>
                        <input type="text" class="form-control text-dark"  id="title"
                            name="title" placeholder="Product Title"
                            class="@error('title') is-invalid @enderror" value="{{ old('title', $product->title) }}">

                        @error('title')
                            <div class="alert  alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="">
                        <button type="submit" class="btn btn-outline-warning btn-sm">Update</button>
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
