<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


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
            'longitude' => 'nullable|numeric', // New validation for longitude
            'latitude' => 'nullable|numeric' // New validation for latitude
        ]);

        // Include latitude and longitude in the user creation array
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'contact_num' => $validated['contact_num'],
            'street' => $validated['street'],
            'barangay' => $validated['barangay'],
            'municipality' => $validated['municipality'],
            'role' => $validated['role'],
            'longitude' => $request->longitude, // Save longitude
            'latitude' => $request->latitude // Save latitude
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully with location data.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::findOrFail($id); // Fetch user by ID or fail if not found
        return view('users.show', compact('user')); // Return view with user dat
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::findOrFail($id); // Retrieve the user by ID
        return view('users.edit', compact('user')); // Return the edit view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Debugging: Log the incoming request
        Log::info('Update User Request:', $request->all());
        Log::info('User Location Before Save:', ['latitude' => $user->latitude, 'longitude' => $user->longitude]);


        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'contact_num' => 'nullable|string|max:15',
            'street' => 'nullable|string|max:255',
            'barangay' => 'nullable|string|max:255',
            'municipality' => 'nullable|string|max:255',
            'role' => 'required|in:customer,pharmacist,rider,admin',
            'longitude' => 'nullable|numeric', // Add validation for longitude
            'latitude' => 'nullable|numeric',  // Add validation for latitude
        ]);
        
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->longitude = $request->longitude; // Save longitude
        $user->latitude = $request->latitude;  // Save latitude

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->contact_num = $request->contact_num;
        $user->street = $request->street;
        $user->barangay = $request->barangay;
        $user->municipality = $request->municipality;

        Log::info('User Role Before Save:', [$user->role, $request->role]);

        $user->role = $request->role;

        try {
            $user->save();
            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating user:', ['error' => $e->getMessage()]);
            return back()->withErrors('Error updating user.');
        }
        

        // Attempt to save the updated user
        try {
            $user->save();
            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating user:', ['error' => $e->getMessage()]);
            return back()->withErrors('Error updating user.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
