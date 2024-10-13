<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        
        return view('welcome', compact('reviews'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string|max:1000', 
            'rating' => 'required|integer|between:1,5',
        ]);

        Review::create($validatedData);

        return redirect()->route('welcome')->with('success', 'Review submitted successfully!');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete(); 
        return redirect()->route('dashboard')->with('success', 'Review deleted successfully!'); 
    }
}
