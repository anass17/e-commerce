<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get the search query and filter options
        $search = $request->input('search');
        $priceUnder20 = $request->has('priceUnder20');
        $priceOver20 = $request->has('priceOver20');

        // Start the query
        $query = Product::query();

        // Apply search filter if present
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Apply price filters
        if ($priceUnder20) {
            $query->where('price', '<', 20);
        }

        if ($priceOver20) {
            $query->where('price', '>=', 20);
        }

        // Get the filtered products
        $products = $query->get();

        // Pass the products and filters to the view
        return view('products/show', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
        ]);

        $product = new Product();
        $product -> name = $request->name;
        $product -> description = $request->description;
        $product -> price = $request->price;
        $product -> save();

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
