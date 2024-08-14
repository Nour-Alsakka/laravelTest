<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Categories;
use App\Models\Products;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::get();

        return  View('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            //upload image
            if (!File::exists(storage_path('app/public/media'))) {
                File::makeDirectory(storage_path('app/public/media'));
            }

            $file = $request->image;
            $name = $file->hashName();
            $filename = time() . '.' . $name;
            $file->storeAs('public/media/', $filename);

            $check =  Products::create([
                'title' => $request->title,
                'desc' => $request->desc,
                'category_id' => $request->category_id,
                'image' => $filename,
            ]);

            if ($check) {
                return back()->with('success', 'The Product has inserted successfully');
            }
        } catch (Exception $e) {

            return back()->withErrors(['error' => 'something happend']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        //
    }
}
