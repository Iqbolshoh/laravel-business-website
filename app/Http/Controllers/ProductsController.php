<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SocialLink;

class ProductsController extends Controller
{
    public function index()
    {
        $socialLinks = SocialLink::all();
        $categories = Category::all();

        $products = Product::with('images', 'category')->get();

        $groupedProducts = $products->groupBy('category_id');

        return view('products', compact('socialLinks', 'categories', 'groupedProducts'));
    }

    public function show($id)
    {
        $product = Product::with('images', 'category')->findOrFail($id);
        $socialLinks = SocialLink::all();

        return view('product-details', compact('product', 'socialLinks'));
    }
}

