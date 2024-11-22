<link rel="stylesheet" href="{{ asset('template/outside/css/select2.min.css') }}" />
<form>
    <div class="col-md-12">
        <a href="/admin/crud/list/products-resources">Add Products</a>
        <div class="col-md-12">
            <label for="inputPassword3" class="col-sm-3 control-label">Search and select products to add customised
                fields
            </label>
            <div class="col-md-6">
                <select id="products" name="products[]" multiple="multiple" class="form-control">
                    <option></option>
                    @foreach($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->name }} ({{ $product->id }})
                        {{ $product->id }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">

                <input style="margin: 10px 0px" type="text" name="field" placeholder="Enter field name..."
                    class="form-control" />
            </div>

            <div class="col-md-6">

                <input style="margin: 10px 0px" type="text" name="field" placeholder="Enter field value..."
                    class="form-control" />

            </div>

        </div>
    </div>
    <div style="display:flex;">
        <button class="btn btn-warning" style="margin: 0px 10px">Add Field</button>
        <button class="btn btn-success">Save Fields</button>
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