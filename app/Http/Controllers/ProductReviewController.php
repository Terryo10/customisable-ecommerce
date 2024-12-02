<?php

namespace App\Http\Controllers;

use App\Models\BankingDetails;
use App\Models\Orders;
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
        if (!$request->rating) {
            session()->flash('message', 'Please you should add 1 star at least!!');
            return redirect()->to("/product/$product_id");
        }
        $request->validate([
            'rating' => 'required',
            'review' => 'required|min:6',
        ]);

        ProductReviews::create([
            'user_id' => Auth::user()->id,
            'review' => $request->review,
            'rating' => $request->rating,
            'product_id' => $product_id
        ]);
        session()->flash('message', 'Review added successfully!!');
        return redirect()->to("/product/$product_id");
    }

    public function downInvoiceAsPDF(Request $request, $order_id)
    {

        $order = Orders::where('id', $order_id)->first();

        $data = [
            'order' => $order ?? "N/A",
            'bankingDetails' => BankingDetails::get(),
        ];

        $pdf = \PDF::loadView('invoice', $data);
        return $pdf->download('SlimRiffInvoice.pdf');
    }
    public function downReceiptAsPDF(Request $request, $order_id)
    {

        $order = Orders::where('id', $order_id)->first();

        $data = [
            'order' => $order ?? "N/A",
        ];

        $pdf = \PDF::loadView('receipt', $data);
        return $pdf->download('SlimRiffReceipt.pdf');
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
