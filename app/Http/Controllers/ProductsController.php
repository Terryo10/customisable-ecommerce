<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Sliders;
use Illuminate\Http\Request;

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

    public function addProductFields(Request $request)
    {

        // Validate input
        $validatedData = $request->validate([
            'products' => 'required|array',
        ]);

        // Process the data
        // Example: Attach custom fields to products
        foreach ($validatedData['products'] as $productId) {
            // Save or update the fields as needed
        }

        return redirect()->back();
    }
}
