<?php

namespace App\Http\Controllers;

use App\Models\ProductReviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $product_id)
    {
        ProductReviews::create([
            'user_id' => Auth::user()->id,
            'review' => $request->review,
            'rating' => $request->rating,
            'product_id' => $product_id
        ]);
        session()->flash('message', 'Review added successfully!!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $product_id)
    {
        ProductReviews::findOrFail($product_id)->where('user_id', Auth::user()->id)->delete();
        session()->flash('message', 'Review deleted successfully!!');
        return redirect()->back();
    }
}
