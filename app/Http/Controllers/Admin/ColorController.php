<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::getColor();
        return view('admin.color.list', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());


        $validated = $request->validate([
            'color_name' => 'required',

        ]);


        // Create a new admin
        $admin = Color::create([
            'color_name' => $request->color_name,
            'color_code' => $request->color_code,
            'status' => $request->status,
            'created_by' => Auth::user()->id,

        ]);

        // dd($admin);

        // Redirect to the admin list with success message
        return redirect()->route('color.index')->with('success', 'Color created successfully!');
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
        $color = Color::getSingleColor($id);
        return view('admin.color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validated = $request->validate([
            'color_name' => 'required',



        ]);


        // Update a new admin
        $category = Color::getSingleColor($id);


        $category->update([
            'color_name' => $request->color_name,
            'color_code' => $request->color_code,
            'status' => $request->status,
            'created_by' => Auth::user()->id,

        ]);
        // if (!empty($request->password)) {
        //     $user->password = bcrypt($validated['password']);
        // }



        // Redirect to the admin list with success message
        return redirect()->route('color.index')->with('success', 'Color updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $user = Color::getSingleColor($id);
        $user->delete();
        return redirect()->route('color.index')->with('success', 'Color deleted successfully!');
    }
}
