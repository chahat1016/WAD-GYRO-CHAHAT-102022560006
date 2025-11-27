<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // 1. Import Product model
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // 2. Display a list of all products from the product table using compact
    public function index()
    {
        $products = Product::all(); // get all products
        return view('admin.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // 3. Display the form to add a new product
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // 4. Save a new product into the products table
    public function store(Request $request)
    {
        // Validate product input data
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $productData = $request->only('name', 'description', 'price');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $productData['image'] = $imagePath;
        }

        Auth::user()->products()->create($productData);

        session()->flash('success', 'Product successfully created!');
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    // 5. Retrieve product data by id and display it on the product detail page
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // 6. Display the edit form for a product by id
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    // 7. Save changes to product data based on id
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $productData = $request->only('name', 'description', 'price');

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
            $productData['image'] = $imagePath;
        }

        $product->update($productData);

        session()->flash('success', 'Product successfully updated!');
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // 8. Delete a product by id
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        $product->delete();

        session()->flash('success', 'Product successfully deleted!');
        return redirect()->route('admin.index');
    }
}
