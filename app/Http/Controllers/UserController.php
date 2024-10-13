<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('dashboard', compact('users')); 
    }

    /**
     * Update the specified user.
     */
    public function update(Request $request, User $user)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id, // Ensure email is unique, excluding the current user
        ]);

        // Update user details
        $user->update($request->only('name', 'email'));

        // Redirect back with success message
        return redirect()->route('users.index')->with('status', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        // Delete the user
        $user->delete();

        // Redirect back with success message
        return redirect()->route('users.index')->with('status', 'User deleted successfully.');
    }
}
