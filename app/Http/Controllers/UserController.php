<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::query();

        if ($request->has('q') && !empty($request->q)) {
            $users->where('name', 'LIKE', '%' . $request->q . '%');
        }

        if ($request->has('role') && !empty($request->role)) {
            $users->where('role', $request->role);
        }

        $usersResult = $users->get();

        // Get the count of users by specific roles
        $customerCount = User::where('role', 'customer')->count();
        $riderCount = User::where('role', 'rider')->count();
        $pharmacistCount = User::where('role', 'pharmacist')->count();

        return view('users.index', [
            'users' => $usersResult,
            'customerCount' => $customerCount,
            'riderCount' => $riderCount,
            'pharmacistCount' => $pharmacistCount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'contact_num' => 'nullable|string|max:20',
            'street' => 'nullable|string|max:255',
            'barangay' => 'nullable|string|max:255',
            'municipality' => 'nullable|string|max:255',
            'role' => 'required|string|in:customer,pharmacist,rider,admin',
        ]);

        User::create($validated);
        return redirect()->route('users.index')->with('success', 'User created successfully.');

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
