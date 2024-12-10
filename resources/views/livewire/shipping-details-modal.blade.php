<div>
    @php
    $profile = Auth::user()->profile ?? false;
    @endphp
    <div className="block relative">
        <div class="modal fade" id="quickViewModalShippingDetails" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>Update Your Shipping details For ({{$productid ?? "N/A"}})</p>
                        <span type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="
                                margin-right: 10px;">

                            X</span>
                    </div>
                    <div class="modal-body" style="overflow: hidden scroll;height: 60vh !important;">

                        <div class="d-flex justify-content-start">
                            <form method="POST" action="/update/shipping/details">
                                @csrf

                                <div class="short-desc section">
                                    <h5 class="pd-sub-title" style="margin-bottom: 10px;">
                                        {{"Enter Your First Name"}}
                                    </h5>
                                    <p>
                                        <input type="text" class="form-control" name="first_name"
                                            value="{{$profile->first_name ?? null}} "
                                            placeholder="Enter your first name..." required />

                                    </p>
                                </div>

                                <div class="short-desc section">
                                    <h5 class="pd-sub-title" style="margin-bottom: 10px;">
                                        {{"Enter Your Last Name"}}
                                    </h5>
                                    <p>
                                        <input type="text" class="form-control" name="last_name"
                                            value="{{$profile->last_name ?? null}} "
                                            placeholder="Enter your last name..." required />

                                    </p>
                                </div>

                                <div class="short-desc section">
                                    <h5 class="pd-sub-title" style="margin-bottom: 10px;">
                                        {{"Enter Your Address Details"}}
                                    </h5>
                                    <p>
                                        <input type="text" class="form-control" name="address"
                                            value="{{$profile->address ?? null}} " placeholder="Enter your address..."
                                            required />


                                    </p>
                                </div>

                                <div class="short-desc section">
                                    <h5 class="pd-sub-title" style="margin-bottom: 10px;">
                                        {{"Enter Your Company"}}
                                    </h5>
                                    <p>
                                        <input type="text" class="form-control" name="company"
                                            value="{{$profile->company ?? null}} "
                                            placeholder="Enter your company..." />


                                    </p>
                                </div>

                                <div class="short-desc section">
                                    <h5 class="pd-sub-title" style="margin-bottom: 10px;">
                                        {{"Enter Your City"}}
                                    </h5>
                                    <p>
                                        <input type="text" class="form-control" name="city"
                                            value="{{$profile->city ?? null}} " placeholder="Enter your city..." />

                                    </p>
                                </div>
                                <div class="short-desc section">
                                    <h5 class="pd-sub-title" style="margin-bottom: 10px;">
                                        {{"Enter Your State"}}
                                    </h5>
                                    <p>
                                        <input type="text" class="form-control" name="state"
                                            value="{{$profile->state ?? null}} " placeholder="Enter your state..." />

                                    </p>
                                </div>

                                <div class="short-desc section">
                                    <h5 class="pd-sub-title" style="margin-bottom: 10px;">
                                        {{"Enter Your Country"}}
                                    </h5>
                                    <p>
                                        <input type="text" class="form-control" name="country"
                                            value="{{$profile->country ?? null}} " placeholder="Enter your country..."
                                            required />

                                        <input type="submit" name="update"
                                            class="btn btn-success addedFields form-control mt-3"
                                            value="Update Shipping Address" />
                                    </p>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>