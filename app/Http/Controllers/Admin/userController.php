<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function createUser()
    {
        $roleList = Role::all();
        return view('admin.pages.user.create-user', ['role' => $roleList]);
    }
    public function viewUser()
    {
        $userData = User::with('role')->get();
        return view('admin.pages.user.view-user', ['userData' => $userData]);
    }


    public function storeUser(Request $request)
    {
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',
                'role_id' => 'required',
                'status' => 'required',
                'phone_number' => 'required',
            ]);

            User::create([
                'name' => $validatedData['username'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'role_id' => $validatedData['role_id'],
                'status' => $validatedData['status'],
                'phone_number' => $validatedData['phone_number'],
            ]);
            return redirect()->back()->with('success', 'User created successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Error creating User. Please try again.')->withInput();
        }
    }
}
