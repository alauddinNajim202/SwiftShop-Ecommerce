@extends('admin.layouts.app')

@section('title', 'Product Update | Swift Shop')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Update</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('product.update', $product->id) }}" method="post">
                @csrf
                <div class="row">
                    <!-- Left column -->
                    <div class="col-lg-6">
                        <div class="card card-outline card-danger">
                            <div class="card-body">
                                <!-- Product Name -->
                                <div class="form-group">
                                    <label for="title">Product Name</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter name" value="{{ $product->title }}">
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Slug -->
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        placeholder="Enter slug" value="{{ $product->slug }}">
                                    @error('slug')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Category -->
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="">Select</option>
                                        @foreach ($categories as $item)
                                            <option @if ($item->id == $product->category_id) selected @endif
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Sorting -->
                                <div class="form-group">
                                    <label for="order_level">Sorting</label>
                                    <input type="text" class="form-control" id="order_level" name="order_level"
                                        placeholder="Enter number" value="{{ $product->order_level }}">
                                    @error('order_level')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Previous Price -->
                                <div class="form-group">
                                    <label for="old_price">Previous Price</label>
                                    <input type="text" class="form-control" id="old_price" name="old_price"
                                        placeholder="Enter number" value="{{ $product->old_price }}">
                                    @error('old_price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Colors -->
                                <hr class="bg-white">
                                <div class="form-group">
                                    <label>Color</label>
                                    <div>
                                        @foreach ($colors as $color)
                                            @php
                                                $checked = '';
                                            @endphp

                                            @foreach ($product->colors as $product_color)
                                                @if ($product_color->color_id == $color->id)
                                                    @php
                                                        $checked = 'checked';
                                                    @endphp
                                                @endif
                                            @endforeach

                                            <label class="mr-3">
                                                <input type="checkbox" {{ $checked }} value="{{ $color->id }}"
                                                    name="color_id[]">
                                                {{ $color->color_name }}
                                                <span
                                                    style="display:inline-block; width:15px; height:10px; background-color:{{ $color->color_code }}; margin-left:0px; border:1px solid #000; margin-top:5px;"></span>

                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right column -->
                    <div class="col-lg-6">
                        <div class="card card-outline card-danger">
                            <div class="card-body">
                                <!-- SKU -->
                                <div class="form-group">
                                    <label for="sku">SKU</label>
                                    <input type="text" class="form-control" id="sku" name="sku"
                                        placeholder="Enter SKU" value="{{ $product->sku }}">
                                    @error('sku')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
                                    </select>
                                </div>
                                <!-- Sub Category -->
                                <div class="form-group">
                                    <label for="sub_category_id">Sub Category</label>
                                    <select class="form-control" name="sub_category_id" id="sub_category_id">
                                        <option value="">Select</option>
                                        @foreach ($subcategories as $item)
                                            <option @if ($item->id == $product->sub_category_id) selected @endif
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Brand -->
                                <div class="form-group">
                                    <label for="brand_id">Brand</label>
                                    <select class="form-control" name="brand_id" id="brand_id">
                                        <option value="">Select</option>
                                        @foreach ($brands as $item)
                                            <option @if ($item->id == $product->brand_id) selected @endif
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Product Quantity -->
                                <div class="form-group">
                                    <label for="quantity">Product Quantity</label>
                                    <input type="text" class="form-control" id="quantity" name="quantity"
                                        placeholder="Enter quantity" value="{{ $product->quantity }}">
                                    @error('quantity')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Price -->
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        placeholder="Enter number" value="{{ $product->price }}">
                                    @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Size and Color Table -->
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="card card-outline card-danger">
                            <div class="card-body">
                                <label>Size and quantity Options</label>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="append_item">


                                        <tr>
                                            <td><input type="text" required name="name[]" placeholder="Name"
                                                    class="form-control"></td>
                                            <td><input type="text" name="size_price[]" placeholder="Price"
                                                    class="form-control"></td>
                                            <td><input type="number" name="size_quantity[]" placeholder="Quantity"
                                                    class="form-control"></td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-info add_new_item">Add</button>

                                            </td>
                                        </tr>
                                        @php
                                            $i= 0;
                                        @endphp
                                        @foreach ($product->sizes as $product_size)
                                            <tr id="delete_item{{ $i }}">
                                                <td>
                                                    <input type="text" name="name[]"
                                                        value="{{ $product_size->name }}" placeholder="Name"
                                                        class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" name="size_price[]"
                                                        value="{{ $product_size->price }}" placeholder="Price"
                                                        class="form-control">
                                                </td>
                                                <td>
                                                    <input type="number" name="size_quantity[]"
                                                        value="{{ $product_size->quantity }}" placeholder="Quantity"
                                                        class="form-control">
                                                </td>
                                                <td>
                                                    <button type="button" id="{{ $i }}"
                                                        class="btn btn-sm btn-outline-danger delete_item">Delete</button>
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Text Areas -->
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="card card-outline card-danger">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="short_description">Short Description</label>
                                    <textarea class="form-control" name="short_description" id="summernote1" rows="6">{{ $product->short_description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="summernote2" rows="4">{{ $product->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="additional_information">Additional Information</label>
                                    <textarea class="form-control" name="additional_information" id="summernote3" rows="4">{{ $product->additional_information }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="shipping_return">Shipping & Return</label>
                                    <textarea class="form-control" name="shipping_return" id="summernote4" rows="4">{{ $product->shipping_return }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row">
                    <div class="col-lg-12 text-center mt-3">
                        <button type="submit" class="btn btn-outline-info">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        $(function() {
            // Initialize Summernote
            $('#summernote1, #summernote2, #summernote3, #summernote4').summernote();
        });

        var i = 2;

        // Add new item
        $('.add_new_item').on('click', function() {
            alert('Are You sure you want to add new item?');
            let html = `<tr id="delete_item` + i + `" >
                                    <td>
                                        <input type="text" name="name[]" placeholder="Name"   class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="size_price[]" placeholder="Price"  class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="size_quantity[]" placeholder="Quantity"  class="form-control">
                                    </td>
                                    <td>
                                        <button type="button" id="` + i + `" class="btn btn-sm btn-outline-danger delete_item">Delete</button>

                                    </td>
                                </tr>`;
            i++;
            $('#append_item').append(html);
        });

        // remove item
        $('#append_item').on('click', '.delete_item', function() {
            alert('Are You sure you want to delete this item?');
            var id = $(this).attr('id');
            $('#delete_item' + id).remove();

        });




        $(document).ready(function() {
            $('#category_id').on('change', function() {
                var categoryId = $(this).val();
                if (categoryId) {
                    $.ajax({
                        url: '{{ url('/get-subcategories') }}/' + categoryId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#sub_category_id').empty();
                            $('#sub_category_id').append('<option value="">Select</option>');
                            $.each(data, function(key, value) {
                                $('#sub_category_id').append('<option value="' + value
                                    .id + '">' + value.name + '</option>');
                            });
                        },
                        error: function() {
                            alert('Failed to load subcategories.');
                        }
                    });
                } else {
                    $('#sub_category_id').empty();
                    $('#sub_category_id').append('<option value="">Select</option>');
                }
            });
        });
    </script>
@endsection
