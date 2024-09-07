<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Brand;
use App\Models\Admin\Color;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use App\Models\Admin\ProductColor;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductSize;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::getProduct();
        // dd($products);
        return view('admin.product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());


        $validated = $request->validate([
            'title' => 'required',
        ]);

        $title = trim($request->title);
        $product = new Product;
        $product->title = $title;
        $product->created_by = Auth::user()->id;
        $product->status = 0;

        $slug = strtolower(str_replace(' ', '-', $title));

        $check_slug = Product::checkSlug($slug);

        if (empty($check_slug) ) {
            $product->slug = $slug;
            $product->save();
        }else{
            $new_slug = $slug . '-' . $product->id;
            $product->slug = $new_slug;
            $product->save();
        }


        return redirect()->route('product.edit', $product->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::getSingleProduct($id);
        $categories = Category::getCategory();
        $colors = Color::getColor();
        $brands = Brand::getBrand();
        $sub_categories = SubCategory::getSubCategory();

        $subcategories = SubCategory::where('category_id', $product->category_id)
                                    ->whereNull('deleted_at')
                                    ->get();


        return view('admin.product.edit', compact('product','subcategories','colors','brands', 'categories', 'sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',


        ]);


            // Update a new admin
            $product = Product::getSingleProduct($id);


            $product->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'sku' => $request->sku,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'brand_id' => $request->brand_id,

                'status' => $request->status,
                'old_price' => $request->old_price,
                'price' => $request->price,
                'order_level' => $request->order_level,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'additional_information' => $request->additional_information,
                'shipping_return' => $request->shipping_return,
                'created_by' => Auth::user()->id ,

            ]);

            // delete old colors
            ProductColor::where('product_id', $product->id)->delete();


            // update new colors
            if (!empty($request->color_id)) {

                foreach ($request->color_id as  $color_id) {
                    $product_color = new ProductColor;
                    $product_color->color_id = $color_id;
                    $product_color->product_id = $product->id;
                    $product_color->created_by = Auth::user()->id;
                    $product_color->save();
                }
            }

             // delete old colors
             ProductSize::where('product_id', $product->id)->delete();


             // update new size
             if (!empty($request->name)) {

                 foreach ($request->name as  $key => $name) {
                     $product_size = new ProductSize;
                     $product_size->product_id = $product->id;
                     $product_size->name = $name;
                     $product_size->price = !empty($request->size_price[$key]) ? $request->size_price[$key]: 0;
                     $product_size->quantity = !empty($request->size_quantity[$key]) ? $request->size_quantity[$key]: 0;

                     $product_size->created_by = Auth::user()->id;
                     $product_size->save();
                 }
             }



            // Redirect to the admin list with success message
            return redirect()->route('product.index')->with('success', 'Product updated successfully!');


    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $product = Product::getSingleProduct($id);
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }

    public function get_subcategory($category_id)
    {
        $subcategories = SubCategory::where('category_id', $category_id)
                                    ->whereNull('deleted_at')
                                    ->get();
        return response()->json($subcategories);
    }



}
