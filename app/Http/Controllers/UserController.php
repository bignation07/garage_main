<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Show the form to create a user
    public function create()
    {
        return view('employees.create_employee');
    }

    // Handle the form submission to store a user
    public function store(Request $request)
    {
        // Validate input data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // password confirmation field should be present
            'role' => 'required|in:admin,user',  // Ensure valid role
            'employee_id' => 'required|unique:users,employee_id',  // Assuming you want employee_id to be unique
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create and store the new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'employee_id' => $request->employee_id,
        ]);

        return redirect()->route('users.create')->with('success', 'User created successfully!');
    }
}
