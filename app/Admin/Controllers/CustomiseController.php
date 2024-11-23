<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CustomizableFields;
use App\Models\Products;
use App\Models\User;
use Carbon\Carbon;
use Encore\Admin\Controllers\Dashboard;

use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Illuminate\Http\Request;

class CustomiseController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Customised Fields')
            ->description('Adding customised fields to products')
            ->row(function (Row $row) {
                $row->column(8, function (Column $column) {
                    $products = Products::get();

                    // Assuming you have a Blade view at resources/views/admin/messenger.blade.php
                    $column->append(view('customisable', ['products' => $products]));
                });
            });
    }


    public function submitForm(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'products' => 'required|array',
        ]);

        // Process the data
        // Example: Attach custom fields to products
        foreach ($validatedData['products'] as $productId) {
            // Save or update the fields as needed
            if ($productId) {
                $create_fields = CustomizableFields::updateOrCreate([
                    'product_id' => $productId
                ], [
                    'fields' => json_encode($request->fields),
                ]);
            }
        }
        // session()->put('success', 'Message was successful!');
        // Redirect back with a success message
        return redirect()->back();
    }



    public function showMessages() {}
}
