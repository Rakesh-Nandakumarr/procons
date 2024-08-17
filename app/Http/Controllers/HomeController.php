<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

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

    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return view('product.show', compact('product'));
    }
}
