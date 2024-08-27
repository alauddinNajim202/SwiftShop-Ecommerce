<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function profile()
    {

        return view('admin.admin.profile');
    }
    public function index()
    {
        $users = User::getAdmin();
        return view('admin.admin.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());


        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',

        ]);


        // Create a new admin
        $admin = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'status' => $request->status,
            'is_admin' => 1,
            'password' => bcrypt($validated['password']),
        ]);

        // dd($admin);

        // Redirect to the admin list with success message
        return redirect()->route('admin.index')->with('success', 'Admin created successfully!');
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
        $user = User::getSingleAdmin($id);
        return view('admin.admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',

        ]);


        // Update a new admin
        $user = User::getSingleAdmin($id);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'status' => $request->status,
            'password' => bcrypt($request->password),
            'is_admin' => 1

        ]);
        // if (!empty($request->password)) {
        //     $user->password = bcrypt($validated['password']);
        // }



        // Redirect to the admin list with success message
        return redirect()->route('admin.index')->with('success', 'Admin updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $user = User::getSingleAdmin($id);
        $user->delete();
        return redirect()->route('admin.index')->with('success', 'Admin deleted successfully!');
    }
}
