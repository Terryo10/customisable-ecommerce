<div>
    <div class="product-section section pt-120 pb-120">
        <div class="container">

            <div class="row justify-content-between">
                <!-- Isotop Product Filter -->
                <div class="isotope-product-filter col-auto">
                    <button class="active" data-filter="*">all</button>
                </div>

            </div>

            <div class="isotope-grid row" id="shop">
                @foreach ($products as $product)

                <!-- Product Item Start -->
                <div class="isotope-item col-xl-3 col-lg-4 col-md-6 col-12 mb-50">
                    <div class="product-item text-center">
                        <!-- Product Image -->
                        <div class="product-img">
                            <!-- Image -->
                            <a class="image" href="#"><img src="/storage/{{$product->feature_image}}" alt="" /></a>
                            <!-- Wishlist Button -->
                            <a class="wishlist" href="#" title="Wishlist"><i class="pe-7s-like"></i></a>
                            <!-- Action Button -->
                            <div class="{{" action-btn fix"}}">
                                <!-- <a href="#" data-bs-toggle="modal"  data-bs-target="#" title="Quick View"></a> -->
                                <a href="#" data-bs-toggle="modal" data-bs-target={{"#quickViewModal$product->id"}}><i
                                        class="{{" pe-7s-look product-btn-$product->id"}}"></i>Quick view</a>

                            </div>
                        </div>
                        <!-- Portfolio Info -->
                        <div class="product-info text-left">
                            <!-- Title -->
                            <h5 class="title">{{ $product->name ?? "" }}</h5>
                            <!-- Price Ratting -->
                            <div class="price-ratting fix">
                                <span class="price float-start"><span class="new">${{ $product->price }}</span></span>
                                <span class="ratting float-end">
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="block relative">
                        <div class="modal fade" id={{"quickViewModal$product->id"}} tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close">Close</button>
                                    </div>
                                    <div class="modal-body" id={{"content_$product->id"}}>
                                        <div class="row">
                                            <div class="col-xl-5 col-md-6 col-12 mb-40">
                                                <div class="tab-content mb-10">
                                                    <div class="pro-large-img tab-pane active"
                                                        id={{"pro-large-img-$product->id"}}>
                                                        <img src="{{" /storage/$product->feature_image"}}" alt="">
                                                    </div>

                                                    @foreach ($product->images as $img)
                                                    <div class="pro-large-img tab-pane" id={{"pro-large-img-$product->
                                                        id"}}>
                                                        <img src={{"/storage/$img"}} alt="" />
                                                    </div>
                                                    @endforeach
                                                </div>

                                                <div class="pro-thumb-img-slider nav">
                                                    @foreach ($product->images as $img)


                                                    <div>
                                                        <a href={{"#pro-large-img-$product->id"}}
                                                            data-bs-toggle="tab">
                                                            <img src="{{" /storage/$img"}}" alt="" />
                                                        </a>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="col-xl-7 col-md-6 col-12 mb-40">
                                                <div class="product-details section">
                                                    <h1 class="title">{{$product->name}}</h1>

                                                    <div
                                                        class="price-ratting section d-flex flex-column flex-sm-row justify-content-between">
                                                        <span class="price">
                                                            <span class="new">
                                                                $ {{$product->price}}
                                                            </span>
                                                        </span>

                                                        <span class="ratting">
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <i class="fa fa-star active"></i>
                                                            <span> (01 Customer Review)</span>
                                                        </span>
                                                    </div>
                                                    <form method="POST" action="{{ route('placeOrder') }}">

                                                        @csrf
                                                        <div>
                                                            @if (session()->has('message'))
                                                            <div class="alert alert-success">
                                                                {{ session('message') }}
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="short-desc section">
                                                            <h5 class="pd-sub-title">
                                                                Quick Overview
                                                            </h5>
                                                            <p>{{$product->description}}</p>
                                                        </div>
                                                        @php
                                                        $productsFields = is_string($product->fields) ?
                                                        json_decode($product->fields == "null" ? "[]": $product->fields,
                                                        true) : $product->fields;

                                                        @endphp
                                                        @foreach ($productsFields as $field)
                                                        @php
                                                        $fieldFields = json_decode($field);
                                                        $fieldFields = json_decode($fieldFields->fields);
                                                        $fieldFields = json_decode($fieldFields == "null" ? "[]":
                                                        $fieldFields);
                                                        $newFieldsSet = $fieldFields == null ? [] : $fieldFields;
                                                        @endphp
                                                        @foreach ($newFieldsSet as $fild)

                                                        <div class="short-desc section">
                                                            <h5 class="pd-sub-title">
                                                                {{$fild->name}}
                                                            </h5>
                                                            <p>
                                                                <input type="text" name="{{$fild->value}}"
                                                                    class="addedFields form-control" required />
                                                            </p>
                                                        </div>

                                                        @endforeach
                                                        @endforeach



                                                        <label>Quantity</label>
                                                        <input style="display: none;" type="text"
                                                            wire:model="order.product_id" name="product_id"
                                                            value={{"$product->id"}} />
                                                        <input style="display: none;" type="text"
                                                            wire:model="order.fields" name="fields" id="addedFields"
                                                            value="[]" />
                                                        <div class="quantity-cart section">
                                                            <div class="product-quantity">
                                                                <input wire:model="order.quantity" name="quantity"
                                                                    type="text" value="0" />
                                                            </div>
                                                            <button type="submit" class="add-to-cart">
                                                                Place Order
                                                            </button>
                                                        </div>

                                                    </form>

                                                    <ul class="usefull-link section">
                                                        <li id="share-btn" data-target="{{$product->id}}">
                                                            <a href="#email">
                                                                <i class="pe-7s-mail"></i> Share
                                                                to a Friend
                                                            </a>
                                                        </li>

                                                        <li id="download" data-target="{{$product->id}}">
                                                            <a href="#print">
                                                                <i class="pe-7s-print"></i> print
                                                            </a>
                                                        </li>
                                                    </ul>

                                                    <div class="share-icons section">
                                                        <span>share :</span>
                                                        <a href="#product">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>
                                                        <a href="#product">
                                                            <i class="fa fa-twitter"></i>
                                                        </a>
                                                        <a href="#product">
                                                            <i class="fa fa-instagram"></i>
                                                        </a>
                                                        <a href="#product">
                                                            <i class="fa fa-pinterest"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Item End -->

                @endforeach

            </div>

            <div class="row">
                <div class="text-center col-12 mt-30">
                    {{-- {{ $products->links() }} --}}
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    document.querySelectorAll('#addedFields').forEach((addedFieldsElement) => {
        const currentData = JSON.parse(addedFieldsElement.value || '[]');
        let fieldName = "";
        let fieldValue = "";
    
        document.querySelectorAll('.addedFields').forEach((field) => {
            field.addEventListener('change', (e) => {
                fieldValue = `${e.target.value}`;
                fieldName = `${e.target.name}`;
    
                if (addedFieldsElement) {
                    // Check if the fieldName already exists in currentData
                    const existingField = currentData.find(item => item.name === fieldName);
    
                    if (existingField) {
                        // Update the value if the fieldName already exists
                        existingField.value = fieldValue;
                    } else {
                        // Add a new object if the fieldName does not exist
                        currentData.push({ name: fieldName, value: fieldValue });
                    }
    
                    // Update the addedFieldsElement value
                    addedFieldsElement.value = JSON.stringify(currentData);
                }
            });
        });
    });
</script>

<!-- Include html2canvas -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>

<script>
    if(window.location.pathname.includes('product')){
        let url = window.location.pathname;
        const param_id = url.substring(url.lastIndexOf("/") + 1);
        window.document.addEventListener('DOMContentLoaded', ()=>{
            document.querySelectorAll(`.product-btn-${param_id}`).forEach((btn)=>{
                btn.click();
            });
        })
        
    }
    document.querySelectorAll('#share-btn').forEach((btn)=>{
        btn.addEventListener('click', async () => {
   let productId = btn.getAttribute('data-target');
         let location = window.location + `product/${productId}`;


        let ptext = window.document.createElement('p');
        ptext.innerHTML = location;
        document.body.appendChild(ptext);


        window.getSelection().selectAllChildren(ptext);
        document.execCommand("copy");
        alert(`Copied! ✅${location}`);
        setTimeout(() => {
            ptext.remove();
        }, 1000);

                });

            });
    document.querySelectorAll('#download').forEach((btn)=>{
btn.addEventListener('click', async () => {
   let productId = btn.getAttribute('data-target');


   var doc = new jsPDF(); 
var specialElementHandlers = { 
    '#editor': function (element, renderer) { 
        return true; 
    } 
};
 
    doc.fromHTML($(`#content_${productId}`).html(), 15, 15, { 
        'width': 190, 
            'elementHandlers': specialElementHandlers 
    }); 
    doc.save('sample-page.pdf'); 

        });
    })
</script>