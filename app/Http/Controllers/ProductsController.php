<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
use App\Models\ProductStock;
use App\Models\Sliders;
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

        $product_id = $request->input('product_id');
        $user_id = Auth::user()->id;
        $fields = $request->fields;
        $quantity = $request->quantity;
        $productQuantity = 0;
        $stock = 0;

        $product = Products::find($product_id);

        $total = $product->price * $quantity;
        foreach ($product->productStock as $stocks) {
            $stock += $stocks->quantity ?? 0;
        }

        $stock = $stock - $quantity;
        if ($stock <= -1) {
            return redirect()->to('/product/' . $product_id)->with('message', 'Your quantity you added is out of stock');
        }
        $productStock = ProductStock::where('product_id', $product_id)->where('quantity', '>', 0)->first();
        if ($productStock) {

            $productStock->update(['quantity' => $stock]);
        }
        $product->update(['quantity' => $stock]);

        Orders::create([
            'product_id' => $product_id,
            'fields' =>  json_encode($fields),
            'user_id' => $user_id,
            'total' => $total,
            'quantity' => $quantity,
            'status' => 'pending',
            'address' => $request->address
        ]);

        return redirect()->to('/orders')->with('message', 'Your order is placed successfully!!');
    }
}
