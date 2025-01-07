<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
use App\Models\ProductStock;
use App\Models\Sliders;
use App\Models\StockHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{

    public function index(Request $request)
    {

        return $this->jsonSuccess(200, "Request Successfully!!", Products::paginate(10), "products");
    }

    public function sliders(Request $request)
    {

        return $this->jsonSuccess(200, "Request Successfully!!", Sliders::get(), "sliders");
    }

    public function placeOrder(Request $request)
    {
        // Validate the request input
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'fields' => 'nullable|array',
            'quantity' => 'required|integer|min:1',

        ]);

        $product_id = $validated['product_id'];
        $fields = $validated['fields'] ?? [];
        $quantity = $validated['quantity'];

        // Find the product and check availability
        $product = Products::with('productStock')->findOrFail($product_id);

        $availableStock = $product->productStock->sum('quantity');

        if ($quantity > $availableStock) {
            return redirect()->to('/product/' . $product_id)
                ->with('message', 'Requested quantity exceeds available stock.');
        }

        $total = $product->price * $quantity;

        // Update stock
        $remainingQuantity = $quantity;

        foreach ($product->productStock as $stock) {
            if ($remainingQuantity <= 0) {
                break;
            }

            if ($stock->quantity > 0) {
                $deduction = min($stock->quantity, $remainingQuantity);
                $stock->update(['quantity' => $stock->quantity - $deduction]);
                $createStockHistory = new StockHistory();
                $createStockHistory->quantity = $stock->quantity;
                $createStockHistory->stock_id = $stock->id;
                $createStockHistory->product_id = $product_id;
                $createStockHistory->quantity_before_deduction = $availableStock;
                $createStockHistory->save();
                $remainingQuantity -= $deduction;
            }
        }

        // Create the order
        Orders::create([
            'product_id' => $product_id,
            'fields' => json_encode($fields),
            'user_id' => Auth::id(),
            'total' => $total,
            'quantity' => $quantity,
            'status' => 'pending',
        ]);

        return redirect()->to('/orders')->with('message', 'Your order has been placed successfully!');
    }

}
