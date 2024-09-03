<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::getCategory();
        return view('admin.category.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());


        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',


        ]);


            // Create a new admin
            $admin = Category::create([
                'name' => $request->name,
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
            return redirect()->route('category.index')->with('success', 'Category created successfully!');




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
        $category = Category::getSingleCategory($id);
        return view('admin.category.edit', compact('category'));
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
            $category = Category::getSingleAdmin($id);


            $category->update([
                'name' => $request->name,
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
            return redirect()->route('category.index')->with('success', 'Category updated successfully!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $user = Category::getSingleCategory($id);
        $user->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
    }
}
