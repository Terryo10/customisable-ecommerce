<link rel="stylesheet" href="{{ asset('template/outside/css/select2.min.css') }}" />
<form method="POST" action="{{ route('add-product-fields')}}" id="custom-fields-form">
    @csrf
    <div class="col-md-12">
        <a href="/admin/crud/list/products-resources">Add Products</a>
        <div class="col-md-12">
            <label for="inputPassword3" class="col-sm-3 control-label">Search and select products to add customised
                fields
            </label>
            <div class="col-md-6">
                <select id="products" name="products[]" multiple="multiple" class="form-control" required>
                    <option></option>
                    @foreach($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->name }} ({{ $product->quantity }})
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6">

                <input style="margin: 10px 0px" type="text" name="new_field_name" placeholder="Enter field name..."
                    class="form-control" />
            </div>

            <div class="col-md-6">

                <input style="margin: 10px 0px" type="text" name="new_field_value" placeholder="Enter field value..."
                    class="form-control" />

            </div>

            <div id="custom_fields_data" class="col-md-12" style="margin: 10px 0px">

                <input type="text" class="form-control" id="customAddedFields" name="fields"
                    placeholder="Added Fields" />
            </div>

        </div>
    </div>
    <div style="display:flex;">
        <button class="btn btn-warning" type="button" style="margin: 0px 10px" id="add_field_button">Add Field</button>
        <button class="btn btn-success" id="save-fields-btn" type="submit">Save Fields</button>
    </div>
</form>


<script src="{{ asset('template/outside/js/jquery.min.js') }}"></script>
<script src="{{ asset('template/outside/js/select2.min.js') }}"></script>

<script>
    const form = document.getElementById('custom-fields-form');
    $(document).ready(function () {
        $("#products").select2({
            placeholder: "Select products",
            allowClear: true,
        });
    });

    document.getElementById('save-fields-btn').addEventListener('click', function (e) {
    e.preventDefault();
    // Your logic here

    form.submit();
    });
   
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const addFieldButton = document.getElementById('add_field_button');
    const customFieldsData = document.getElementById('custom_fields_data');
    const fieldContainer = document.createElement('div');

    // Add field button event listener
    addFieldButton.addEventListener('click', function () {
        const fieldName = document.querySelector('input[name="new_field_name"]').value;
        const fieldValue = document.querySelector('input[name="new_field_value"]').value;

        if (fieldName && fieldValue) {
            // Add to the container
            const fieldElement = document.createElement('div');
            fieldElement.innerHTML = `
                <input type="text" name="custom_fields[${fieldName}]" value="${fieldValue}" readonly />
                <button type="button" class="remove_field_button">Remove</button>
            `;
            // fieldContainer.appendChild(fieldElement);

            // Update hidden input value
            const currentData = JSON.parse(document.getElementById('customAddedFields').value || '[]');
            currentData.push({ name: fieldName, value: fieldValue });
            document.getElementById('customAddedFields').value = JSON.stringify(currentData);
            document.querySelector('input[name="new_field_name"]').value = "";
            document.querySelector('input[name="new_field_value"]').value = "";
            
            // customFieldsData.value = JSON.stringify(currentData);
        } else {
            alert('Please provide both field name and value!');
        }
    });

    // Attach the field container to the DOM
    addFieldButton.parentElement.appendChild(fieldContainer);
});
</script>