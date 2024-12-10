<div>
    <div className="block relative">
        <div class="modal fade" id="quickViewModalShippingDetails" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Update Your Shipping details For ({{$profile->first_name ?? "N/A"}})</h3>
                        <span type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="
                                margin-right: 10px;">

                            X</span>
                    </div>
                    <div class="modal-body" style="height: 100px;">

                        <div class="d-flex justify-content-center h-100">
                            <form method="POST" action="/update/shipping/details">
                                @csrf

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>