<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $products = Products::get();
        $categories = Categories::get();

        return view('site.index', compact('products', 'categories'));
    }

    public function details(string $id)
    {
        $product = Products::get()->find($id);
        $categories = Categories::get();


        return view('site.details', compact('product', 'categories'));
    }
}
