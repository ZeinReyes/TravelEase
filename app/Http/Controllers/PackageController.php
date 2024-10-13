<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    // Display a listing of the packages
    public function index()
    {
        // Retrieve all packages
        $packages = Package::all();

        // Return the view with the packages data
        return view('package', compact('packages'));
    }

    // Store a newly created package in storage
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'guests_allowed' => 'required|integer|min:1',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the package
        Package::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'guests_allowed' => $request->guests_allowed,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        // Redirect to the dashboard after creating a package
        return redirect()->route('dashboard')->with('success', 'Package created successfully!');
    }

    // Update the specified package in storage
    public function update(Request $request, Package $package)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'guests_allowed' => 'required|integer|min:1',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the package
        $package->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'guests_allowed' => $request->guests_allowed,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        // Redirect to the dashboard after updating a package
        return redirect()->route('dashboard')->with('success', 'Package updated successfully!');
    }

    // Remove the specified package from storage
    public function destroy(Package $package)
    {
        $package->delete();
        // Redirect to the dashboard after deleting a package
        return redirect()->route('dashboard')->with('success', 'Package deleted successfully!');
    }
}
