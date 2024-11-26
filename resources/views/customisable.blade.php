<link rel="stylesheet" href="{{ asset('template/outside/css/select2.min.css') }}" />
<form method="POST" action="/admin/add-product-fields" id="custom-fields-form">
    @csrf
    <div class="col-md-12">
        <a href="/admin/products/create">Add Products</a>
        <div class="row">
            <div class="col-md-6">
                <label for="inputPassword3" class="col-sm-12 control-label">Search and select products to add customised
                    fields
                </label>
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
    <div style="display:flex;" class="col-md-12">
        <button class="btn btn-warning" type="button" style="margin: 0px 10px" id="add_field_button">Add Field</button>
        <button class="btn btn-success" id="save-fields-btn" type="submit">Submit Fields</button>
    </div>
</form>


<script src="{{ asset('template/outside/js/jquery.min.js') }}"></script>
<script src="{{ asset('template/outside/js/select2.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $("#products").select2({
            placeholder: "Select products",
            allowClear: true,
        });
    });
   
</script>

<script>
    
</script>