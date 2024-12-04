<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CustomizableFields;
use App\Models\Products;
use App\Models\User;
use Carbon\Carbon;
use Encore\Admin\Admin;
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
        // Admin::js(asset('template/outside/js/custom.js'));
        Admin::script(
          ' 
            
                     const addFieldButton = document.getElementById("add_field_button");
  const customFieldsData = document.getElementById("custom_fields_data");
  const fieldContainer = document.createElement("div");

  // Add field button event listener
  addFieldButton.addEventListener("click", function () {
    const fieldName = document.querySelector(
    `input[name="new_field_name"]`
    ).value;
    const fieldValue = document.querySelector(
      `input[name="new_field_value"]`
    ).value;

    if (fieldName && fieldValue) {
      // Add to the container
      const fieldElement = document.createElement("div");
      fieldElement.innerHTML = `
                  <input type="text" name="custom_fields[${fieldName}]" value="${fieldValue}" readonly />
                  <button type="button" class="remove_field_button">Remove</button>
              `;
      // fieldContainer.appendChild(fieldElement);

      // Update hidden input value
      const currentData = JSON.parse(
        document.getElementById("customAddedFields").value || "[]"
      );
      currentData.push({ name: fieldName, value: fieldValue });
      document.getElementById("customAddedFields").value =
        JSON.stringify(currentData);
      document.querySelector(`input[name="new_field_name"]`).value = "";
      document.querySelector(`input[name="new_field_value"]`).value = "";

      // customFieldsData.value = JSON.stringify(currentData);
    } else {
      alert("Please provide both field name and value!");
    }
  });

  // Attach the field container to the DOM
  addFieldButton.parentElement.appendChild(fieldContainer);
                    '
        );
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
    admin_success('Fields created!!', 'Product fields saved successfully!!');
    // Redirect back with a success message
    return redirect()->back();
  }



  public function showMessages() {}
}
