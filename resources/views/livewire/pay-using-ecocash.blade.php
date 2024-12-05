<div style="margin-bottom: 200px;">
    <livewire:header />

    @php
    $title = "Ecocash";
    @endphp

    <livewire:header-section :title="$title">

        <div class="container row justify-content-center align-items-center">
            <div class="col-md-6">
                @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <form wire:submit.prevent="createPayment">
                    <div class="form-group">
                        <label for="order_id">Order ID</label>
                        <input type="text" id="order_id" class="form-control" value="{{ $orderId }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" id="phone" class="form-control mb-2" wire:model.defer="phone"
                            placeholder="Enter your phone number">
                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                        <span wire:loading.remove>Pay Now Using Ecocash</span>
                        <span wire:loading>Sending...</span>
                    </button>
                </form>

                <div wire:loading>
                    <div class="mt-3 alert alert-info">
                        Processing your payment. Please wait...
                    </div>
                </div>

            </div>

        </div>
</div>