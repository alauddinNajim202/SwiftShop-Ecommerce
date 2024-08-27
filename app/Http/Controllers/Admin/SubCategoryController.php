<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sub_categories = SubCategory::getSubCategory();

        return view('admin.sub_category.list', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::getCategory();

        return view('admin.sub_category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());


        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:sub_categories',


        ]);


            // Create a new admin
            $admin = SubCategory::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'action_date' => $request->action_date,
                'slug' => $request->slug,
                'status' => $request->status,
                'meta_title' => $request->meta_title,
                'meta_icon' => $request->meta_icon,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'created_by' => Auth::user()->id ,

            ]);

            // dd($admin);

            // Redirect to the admin list with success message
            return redirect()->route('sub_category.index')->with('success', 'Sub Category created successfully!');




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
        $sub_category = SubCategory::getSingleSubCategory($id);
        $categories = Category::getCategory();

        return view('admin.sub_category.edit', compact('categories','sub_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',


        ]);


            // Update a new admin
            $category = SubCategory::getSingleSubCategory($id);


            $category->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'action_date' => $request->action_date,
                'slug' => $request->slug,
                'status' => $request->status,
                'meta_title' => $request->meta_title,
                'meta_icon' => $request->meta_icon,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'created_by' => Auth::user()->id ,

            ]);
            // if (!empty($request->password)) {
            //     $user->password = bcrypt($validated['password']);
            // }



            // Redirect to the admin list with success message
            return redirect()->route('sub_category.index')->with('success', 'Sub Category updated successfully!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
