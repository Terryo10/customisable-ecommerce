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
        // $validated = $request->validate([
        //     'product_id' => 'required|exists:products,id',
        //     'fields' => 'nullable|array',
        //     'quantity' => 'required|integer|min:1',

        // ]);

        $product_id = $request->product_id;
        $branch_id = $request->branch_id;
        $fields = $request->fields ?? [];
        $quantity = $request->quantity;

        if ($request->file('attachment')) {
            $imageName = time() . '.' . $request->attachment->extension();
            $request->attachment->move(public_path('profile'), $imageName);

            // Decode the JSON string to a PHP array
            $data = json_decode($fields, true);

            // Check if decoding was successful
            if (is_array($data)) {
                // Iterate over the array to find the "attachment" field
                foreach ($data as &$item) {
                    if (isset($item['name']) && $item['name'] === 'attachment') {
                        $item['value'] = "/profile/$imageName"; // Replace with your desired URL
                    }
                }
                // Clean up the reference
                unset($item);

                $fields = json_encode($data);

                // // Encode the array back to a JSON string
                // $updatedJsonString = json_encode($data, JSON_PRETTY_PRINT);

                // Output the updated JSON
            } else {
                // dd("Invalid JSON string!");
            }
        }

        // Find the product and check availability
        $product = Products::with('productStock')->findOrFail($product_id);

        $availableStock = $product->productStock->where('branch_id', $branch_id)->sum('quantity');

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

                if ("$stock->branch_id" === $branch_id) {
                    $stock->update(['quantity' => $stock->quantity - $deduction]);
                }
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
            'branch_id' => $branch_id,
            'total' => $total,
            'quantity' => $quantity,
            'status' => 'pending',
        ]);

        return redirect()->to('/orders')->with('message', 'Your order has been placed successfully!');
    }
}
