<div>
    @php
    $increment = 1;
    @endphp
    <div class="product-section section pt-120 pb-120">
        <div class="container">

            <div class="row justify-content-between">
                <!-- Isotop Product Filter -->
                <div class="isotope-product-filter col-auto">
                    <button class="active" data-filter="*">all</button>
                </div>

            </div>

            @if ($availabity->isOpen ?? "0" === 1)
            <div class="isotope-grid row" id="shop">
                @foreach ($products as $product)
                @php
                $increment += 1;
                @endphp

                <!-- Product Item Start -->
                <div class="isotope-item col-xl-3 col-lg-4 col-md-6 col-12 mb-50">
                    <div class="product-item text-center">
                        <!-- Product Image -->
                        <div class="product-img">
                            <a href="#!" data-bs-toggle="modal" data-bs-target={{"#quickViewModal$product->id"}}>
                                <!-- Image -->
                                <img src="/storage/{{$product->feature_image}}" alt="{{" $product->description"}}"
                                />
                            </a>
                            <!-- Wishlist Button -->
                            {{-- <a class="wishlist" href="#!" title="Wishlist"><i class="pe-7s-like"></i></a> --}}
                            <!-- Action Button -->
                            <div class="{{" action-btn fix"}}">
                                <!-- <a href="#" data-bs-toggle="modal"  data-bs-target="#" title="Quick View"></a> -->
                                <a href="#!" data-bs-toggle="modal" data-bs-target={{"#quickViewModal$product->id"}}><i
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
                                    @if ($product->reviews->count() > 0)
                                    @php
                                    $newArray = array_fill(0, $product->reviews[0]->rating,
                                    null);
                                    @endphp
                                    @foreach ($newArray as $item)
                                    <i class="fa fa-star active"></i>
                                    @endforeach

                                    @else
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    @endif

                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="block relative">
                        <div class="modal fade" id={{"quickViewModal$product->id"}} tabindex="-1">
                            <div class="modal-dialog modal-dialogs modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <span type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                            style="
                                        margin-right: 10px;">

                                            X</span>
                                    </div>
                                    <div class="modal-body" id={{"content_$product->id"}}>
                                        <div>
                                            @if (session()->has('message'))
                                            <div class="alert alert-success">
                                                {{ session('message') }}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-5 col-md-6 col-12 mb-40">
                                                <div class="tab-content mb-10">
                                                    <div class="{{" pro-large-img tab-pane active"}}" id="{{"
                                                        pro-large-img-$product->id"}}">
                                                        <img src="{{" /storage/$product->feature_image"}}"
                                                        class="{{"pro-large-img-". $product->id}}" alt="">
                                                    </div>

                                                </div>

                                                <div class="pro-thumb-img-slider nav">
                                                    @foreach ($product->images ?? [] as $key => $img)

                                                    <div>
                                                        <span class="{{ $key === 0
                                                            ? " active" : "" }}" data-bs-toggle="tab">
                                                            <img src="{{" /storage/$img"}}" data-target="{{"
                                                                #pro-large-img-$product->id"}}" data-id={{$product->id}}
                                                            alt="" class="img-click"
                                                            />
                                                        </span>
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
                                                            @if ($product->reviews->count() > 0)
                                                            @php
                                                            $newArray = array_fill(0, $product->reviews[0]->rating,
                                                            null);
                                                            @endphp
                                                            @foreach ($newArray as $item)
                                                            <i class="fa fa-star active"></i>
                                                            @endforeach

                                                            @endif



                                                        </span>
                                                    </div>
                                                    @php
                                                    $stock = 0;

                                                    foreach ($product->productStock as $stocks) {
                                                    $stock += $stocks->quantity ?? 0;
                                                    }
                                                    @endphp
                                                    @if ($stock <= 0) <h3>This Item is Out of Stock
                                                        </h3>
                                                        @else

                                                        <form method="POST" action="{{ route('placeOrder') }}">

                                                            @csrf

                                                            <div class="short-desc section">
                                                                <h5 class="pd-sub-title">
                                                                    Quick Overview
                                                                </h5>
                                                                <p>{{$product->description}}</p>
                                                            </div>
                                                            @php
                                                            $productsFields = is_string($product->fields) ?
                                                            json_decode($product->fields == "null" ? "[]":
                                                            $product->fields,
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



                                                            <div class="short-desc section">
                                                                <h5 class="pd-sub-title">
                                                                    {{"Enter Your Shipping Address Details"}}
                                                                </h5>
                                                                <p>
                                                                    @php
                                                                    $userShippingAddress = Auth::user()->profile ??
                                                                    false;
                                                                    @endphp
                                                                    @if ($userShippingAddress)
                                                                    <input type="button" name="address"
                                                                        data-bs-toggle="modal" data-bs-target="{{"
                                                                        #quickViewModalShippingDetails".$product->id}}"
                                                                    class="btn btn-success addedFields form-control"
                                                                    value="Update Shipping Address" />

                                                                    @else
                                                                    <input data-bs-toggle="modal" data-bs-target="{{"
                                                                        #quickViewModalShippingDetails".$product->id}}"
                                                                    type="button" name="address"
                                                                    class="btn btn-success addedFields form-control"
                                                                    value="Add Shipping Address" />
                                                                    @endif
                                                                </p>
                                                            </div>


                                                            <label>Quantity</label>
                                                            <input style="display: none;" type="text" name="product_id"
                                                                value={{"$product->id"}} />
                                                            <input style="display: none;" type="text" name="fields"
                                                                id="addedFields" value="[]" />
                                                            <div class="quantity-cart section">
                                                                <div class="product-quantity">
                                                                    <input name="quantity" type="number" value="1"
                                                                        required />
                                                                </div>
                                                                @if ($userShippingAddress)
                                                                <button type="submit" class="add-to-cart">
                                                                    Place Order
                                                                </button>

                                                                @else
                                                                <button type="button" class="add-to-cart">
                                                                    Please update your shipping details..
                                                                </button>

                                                                @endif
                                                            </div>

                                                        </form>
                                                        @endif

                                                        <ul class="usefull-link section">
                                                            <li id="share-btn" data-target="{{$product->id}}">
                                                                <a href="#!">
                                                                    <i class="pe-7s-mail"></i> Share
                                                                    to a Friend
                                                                </a>
                                                            </li>


                                                        </ul>

                                                        <div class="share-icons section">
                                                            <span>share :</span>
                                                            <a
                                                                href="https://www.facebook.com/profile.php?id=100082974115013">
                                                                <i class="fa fa-facebook"></i>
                                                            </a>
                                                            <a
                                                                href="https://www.instagram.com/slimriff?igsh=MWVoMm5vZHF4NTY5cQ==">
                                                                <i class="fa fa-instagram"></i>
                                                            </a>

                                                        </div>

                                                        <div class="">
                                                            @php
                                                            $review_product = $product;
                                                            @endphp
                                                            {{-- <livewire:products-reviews :product="$review_product">
                                                                --}}
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

            @else

            <div class="isotope-grid row" id="shop">
                <h3>Shop closed!!!</h3>
            </div>
            @endif


        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.img-click').forEach((img)=>{
        img.addEventListener('click', function (e){
            document.querySelectorAll(`.pro-large-img-${e.target.getAttribute('data-id')}`).forEach((element)=>{
                element.setAttribute('src', e.target.getAttribute('src'));
            })
        })
    })

    });
    // document.addEventListener("DOMContentLoaded", () => {
    const stars = document.querySelectorAll(".star");
    const reviewText = document.getElementById("reviewText");
    const reviewsList = document.getElementById("reviewsList");
    const submitButton = document.getElementById("submitReview");
    let selectedRating = 0;

    // Star rating hover and click events
    stars.forEach(star => {
      star.addEventListener("mouseover", () => {
        highlightStars(star.dataset.value);
      });

      star.addEventListener("mouseout", () => {
        highlightStars(selectedRating);
      });

      star.addEventListener("click", () => {
        selectedRating = star.dataset.value;
        let createdInput = document.createElement('input');
        createdInput.name = "rating";
        createdInput.value = selectedRating;
        createdInput.classList.add('form-control');
        createdInput.style.display = "none";
        star.parentElement.appendChild(createdInput);
        highlightStars(selectedRating);
      });
    });

    function highlightStars(rating) {
      stars.forEach(star => {
        if (star.dataset.value <= rating) {
          star.classList.add("selected");
        } else {
          star.classList.remove("selected");
        }
      });
    }


//   });

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
    if(window.location.pathname.includes('login')){
        window.document.addEventListener('DOMContentLoaded', ()=>{

        document.querySelectorAll(`.loginModal`).forEach((btn)=>{
                btn.click();
            });

        });
    }
    if(window.location.pathname.includes('register')){
        window.document.addEventListener('DOMContentLoaded', ()=>{

        document.querySelectorAll(`.loginModal`).forEach((btn)=>{
                btn.click();
            });

        });
    }
    if(window.location.pathname.includes('contact')){
        window.document.addEventListener('DOMContentLoaded', ()=>{

        document.querySelectorAll(`.contactModal`).forEach((btn)=>{
                btn.click();
            });

        });
    }
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