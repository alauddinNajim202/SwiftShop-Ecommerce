<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::getBrand();

        return view('admin.brand.list', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());


        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands',


        ]);


            // Create a new admin
            $admin = Brand::create([
                'name' => $request->name,
                'action_date' => $request->action_date,
                'slug' => $request->slug,
                'status' => $request->status,
                'meta_title' => $request->meta_title,
                'meta_icon' => $request->meta_icon,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'order_level' => $request->order_level,
                'created_by' => Auth::user()->id ,

            ]);

            // dd($admin);

            // Redirect to the admin list with success message
            return redirect()->route('brand.index')->with('success', 'Brand created successfully!');




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
    public function edit(string $id)
    {
        $brand = Brand::getSingleBrand($id);
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',


        ]);


            // Update a new admin
            $brand = Brand::getSingleBrand($id);


            $brand->update([
                'name' => $request->name,
                'action_date' => $request->action_date,
                'slug' => $request->slug,
                'status' => $request->status,
                'meta_title' => $request->meta_title,
                'order_level' => $request->order_level,

                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'created_by' => Auth::user()->id ,

            ]);
            // if (!empty($request->password)) {
            //     $user->password = bcrypt($validated['password']);
            // }



            // Redirect to the admin list with success message
            return redirect()->route('brand.index')->with('success', 'Brand updated successfully!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {

        $brand = Brand::getSingleBrand($id);
        $brand->delete();
        return redirect()->route('brand.index')->with('success', 'Brand deleted successfully!');
    }
}
