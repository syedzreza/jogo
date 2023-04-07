<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('admin.dashboard.index',compact('categories','products'));
    }
}
