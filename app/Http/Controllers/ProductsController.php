<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orchid\Support\Facades\Toast;

class ProductsController extends Controller
{
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


        Toast::info('Product customised fields saved successfully!');

        return redirect()->back();
    }
}
