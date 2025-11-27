<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating'     => 'required|integer|min:1|max:5',
            'comment'    => 'nullable|string|max:1000',
        ]);

        $product = Product::findOrFail($request->product_id);

        $review = new Review([
            'user_id' => $request->user()->id,
            'rating'  => $request->rating,
            'comment' => $request->comment,
        ]);

        $product->reviews()->save($review);

        session()->flash('success', 'Review berhasil ditambahkan!');
        return redirect()->route('products.show', ['product' => $product->id]);
    }

    public function update(Request $request, string $id)
    {
        // not used
    }

    public function destroy(string $id)
    {
        $review = Review::findOrFail($id);

        // Only allow owner or admin
        if ($review->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
            return redirect()->route('products.show', ['product' => $review->product_id])
                ->with('error', 'Anda tidak memiliki izin untuk menghapus review ini!');
        }

        $productId = $review->product_id;

        $review->delete();

        session()->flash('success', 'Review berhasil dihapus!');
        return redirect()->route('products.show', ['product' => $productId]);
    }
}
