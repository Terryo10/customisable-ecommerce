<div>
    <livewire:header />

    @php
    $title = "Orders";
    @endphp

    <livewire:header-section :title="$title">
        <div class="page-section section pt-120 pb-80">
            <div class="container">
                <div class="row">
                    <form action="#">
                        <div class="col-xs-12">
                            @if (session()->has('error'))
                            <div class="alert alert-danger mb-2" style="margin-top: 80px;">
                                {{ session('error') }}
                            </div>
                            @endif
                            @if (session()->has('message'))
                            <div class="alert alert-success mt-3">
                                {{ session('message') }}
                            </div>
                            @endif
                            <div class="wishlist-table table-responsive mb-40">
                                <table>
                                    <thead>
                                        <tr>
                                            {{-- <th>Select</th> --}}
                                            <th>Order ID</th>
                                            <th class="pro-remove">Quantity</th>
                                            <th class="pro-remove">Order Branch</th>
                                            <th class="pro-thumbnail">Image</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-price">Unit Price</th>
                                            <th class="pro-stock-stauts">Order Stauts</th>
                                            <th class="pro-add-to-cart">Added Options</th>
                                            <th class="pro-add-to-cart">Order Creation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                        <tr>
                                            {{-- <td><input type="checkbox" class="row-checkbox"
                                                    data-id="{{$order->id}}">
                                            </td> --}}
                                            <td>{{$order->id}}</td>
                                            <td class="pro-remove">
                                                <a href="#">× {{$order->quantity}}</a>
                                            </td>
                                            <td class="pro-remove">
                                                <a href="#">{{$order->branch->name ?? ""}}</a>
                                            </td>
                                            <td class="pro-thumbnail">

                                                <img src="{{" /storage/".$order->product->feature_image}}" alt="" />

                                            </td>
                                            <td class="pro-title">
                                                {{$order->product->name}}
                                            </td>
                                            <td class="pro-price">
                                                <span class="amount">${{$order->total}}</span>
                                            </td>
                                            <td class="pro-stock-stauts">
                                                <span class="out-stock">{{$order->status}}</span>
                                                <span>
                                                    @if ($order->status === "paid")
                                                    <a class="btn btn-success text-white" href="{{" /download-receipt/"
                                                        . $order->id}}">Download
                                                        Receipt</a>
                                                    @else
                                                    <a class="btn btn-warning text-white mb-1" href="{{"
                                                        /download-invoice/" . $order->id}}">Download
                                                        Invoice</a>
                                                    @endif
                                                </span>

                                                @if ($order->transaction)
                                                @if ($order->transaction->isPaid !== 1)
                                                @if ($order->status !== "paid")


                                                <a href="{{" /handle-payment/" . $order->id}}" class="btn btn-danger
                                                    form-control text-white mb-3">Retry Payment Using VISA / Ecocash /
                                                    Mastercard / Inn Bucks
                                                </a>
                                                <a wire:navigate href="{{" /pay-ecocash/" . $order->id}}" class="btn
                                                    btn-primary
                                                    form-control text-white mb-3">Retry Ecocash
                                                </a>
                                                <a wire:navigate href="{{" /pay-cash/" . $order->id}}" class="btn
                                                    btn-primary
                                                    form-control text-white mb-3">Retry Cash
                                                </a>
                                                @endif
                                                @endif
                                                @else

                                                @if ($order->status !== "paid")


                                                <a href="{{" /handle-payment/" . $order->id}}" class="btn btn-success
                                                    form-control text-white mb-3">Pay
                                                    Now Using VISA / Ecocash / Mastercard / Inn Bucks</a>
                                                <a wire:navigate href="{{" /pay-ecocash/" . $order->id}}" class="btn
                                                    btn-primary
                                                    form-control text-white mb-3">Pay
                                                    Using Ecocash</a>
                                                <a wire:navigate href="{{" /pay-cash/" . $order->id}}" class="btn
                                                    btn-primary
                                                    form-control text-white mb-3">Pay
                                                    Using Cash</a>

                                                @endif

                                                @endif


                                            </td>
                                            <td>
                                                <a href="#">
                                                    @php

                                                    $data = json_decode($order->fields ?? "[]");
                                                    $data = json_decode($data ?? "[]");
                                                    @endphp
                                                    @foreach ($data as $fild)

                                                    <div class="short-desc section">
                                                        <h5 class="pd-sub-title">
                                                            Field Name : {{$fild->name}}
                                                        </h5>
                                                        @if (($fild->type ?? "text") === "attachment")
                                                        @if (str_contains($fild->value, "profile"))
                                                        <a href="{{ $fild->value }}" download class="btn btn-success">
                                                            Download Attachment
                                                        </a>
                                                        @endif
                                                        @else

                                                        <p>
                                                            Field Value : {{$fild->value}}
                                                        </p>
                                                        @endif
                                                    </div>

                                                    @endforeach
                                                </a>
                                            </td>
                                            <td>{{$order->created_at}}</td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </form>
                    {{-- <form method="POST" action="/bulk-checkout">
                        <button id="saveButton" class="btn btn-warning text-white">Bulk CheckOut</button>
                        <input type="text" name="items" placeholder="Selected bulk items" />
                        <p id="output"></p>
                    </form> --}}
                </div>
            </div>
        </div>
        <script>
            const saveButton = document.getElementById('saveButton');
            const output = document.getElementById('output');
        
            saveButton.addEventListener('click', () => {
              const selectedIds = [];
              const checkboxes = document.querySelectorAll('.row-checkbox:checked');
        
              checkboxes.forEach((checkbox) => {
                selectedIds.push(checkbox.getAttribute('data-id'));
              });
        
              // Output the selected IDs
              output.textContent = `Selected IDs: ${selectedIds.join(', ')}`;
              console.log('Selected IDs:', selectedIds);
        
              // You can now use `selectedIds` to perform further actions like removal.
            });
        </script>
        <livewire:footer />
</div>