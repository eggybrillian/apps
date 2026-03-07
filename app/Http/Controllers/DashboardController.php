<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalRevenue = Product::sum(DB::raw('price * stock'));
        $recentUsers = User::latest()->take(5)->get();
        $recentProducts = Product::latest()->take(5)->get();

        return view('dashboard', compact('totalUsers', 'totalProducts', 'totalRevenue', 'recentUsers', 'recentProducts'));
    }
}