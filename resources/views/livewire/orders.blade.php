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
                            <div class="wishlist-table table-responsive mb-40">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="pro-remove">Quantity</th>
                                            <th class="pro-thumbnail">Image</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-price">Unit Price</th>
                                            <th class="pro-stock-stauts">Order Stauts</th>
                                            <th class="pro-add-to-cart">Added Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                        <tr>
                                            <td class="pro-remove">
                                                <a href="#">× {{$order->quantity}}</a>
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
                                                @if ($order->transaction->isPaid !== "1")


                                                <a href="{{" /handle-payment/" . $order->id}}" class="btn btn-danger
                                                    form-control text-white">Retry Payment
                                                </a>

                                                @endif
                                                @else

                                                <a href="{{" /handle-payment/" . $order->id}}" class="btn btn-success
                                                    form-control text-white">Pay
                                                    Now</a>

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
                                                        <p>
                                                            Field Value : {{$fild->value}}
                                                        </p>
                                                    </div>

                                                    @endforeach
                                                </a>
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <livewire:footer />
</div>