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
                                            <th class="pro-remove">Remove</th>
                                            <th class="pro-thumbnail">Image</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-price">Unit Price</th>
                                            <th class="pro-stock-stauts">Order Stauts</th>
                                            <th class="pro-add-to-cart">Added Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pro-remove">
                                                <a href="#">×</a>
                                            </td>
                                            <td class="pro-thumbnail">
                                                <a href="#">
                                                    <img src="img/product/2.jpg" alt="" />
                                                </a>
                                            </td>
                                            <td class="pro-title">
                                                <a href="#">DSR Eiffel chair</a>
                                            </td>
                                            <td class="pro-price">
                                                <span class="amount">$137.00</span>
                                            </td>
                                            <td class="pro-stock-stauts">
                                                <span class="out-stock">out stock</span>
                                            </td>
                                            <td class="pro-add-to-cart">
                                                <a href="#" class="add-to-cart">
                                                    add to cart
                                                </a>
                                            </td>
                                        </tr>
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