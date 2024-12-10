<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
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

        $product_id = $request->product_id;
        $user_id = Auth::user()->id;
        $fields = $request->fields;
        $quantity = $request->quantity;

        $product = Products::where('id', $product_id)->first();

        $total = $product->price * $quantity;
        $productQuantity = $product->quantity - $quantity;

        if ($productQuantity <= -1) {
            return redirect()->to('/product/' . $product_id)->with('message', 'Your quantity you added is out of stock');
        }

        $product->update(['quantity' => $productQuantity]);

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
