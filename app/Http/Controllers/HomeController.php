<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)
            ->orderBy('updated_at', 'desc')
            ->with(['products' => function ($query) {
                $query->where('status', 1);
            }])
            ->get();

        return view('home', compact('categories'));
    }

    public function cart()
    {
        return view('cart');
    }
}
