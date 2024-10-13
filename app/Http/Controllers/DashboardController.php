<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        $reviews = Review::all();
        $packages = Package::all();
        $users = User::all();
        return view('dashboard', compact('reviews', 'packages', 'users'));
    }
}
