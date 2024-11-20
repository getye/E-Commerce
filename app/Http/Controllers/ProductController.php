<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    

    // Store new product in the database
    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
        ]);

        // Handle the image upload
    if ($request->hasFile('image')) {
        // Store in 'storage/app/public/product-images'
        $imagePath = $request->file('image')->store('product-images', 'public'); 
        // Save the path to the database
        $validatedData['image'] = $imagePath; 
    }

        // Create a new product record
        $product = Product::create($validatedData);

        // Return a success response or redirect
        return back()->with('success', 'Product added successfully!');
    }

        // Fetch all products and send to frontend
        public function view()
        {
            $products = Product::all();  // Retrieve all products from the database
    
            // Return data to Inertia (Vue.js component)
            return Inertia::render('View', [
                'products' => $products
            ]);
        }
}
