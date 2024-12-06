<div style="margin-bottom: 200px;">
    <livewire:header />

    @php
    $title = "Ecocash";
    @endphp

    <livewire:header-section :title="$title">

        <div class="container row justify-content-center align-items-center">
            <div class="col-md-6">
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
                <form wire:submit.prevent="createPayment">
                    <div class="form-group" style="display: none;">
                        <label for="order_id">Order ID</label>
                        <input type="text" id="order_id" class="form-control" value="{{ $orderId }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" id="phone" class="form-control mb-2" wire:model.defer="phone"
                            placeholder="Enter your phone number">
                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mb-3" wire:loading.attr="disabled">
                        <span wire:loading.remove>Pay Now Using Ecocash</span>
                        <span wire:loading>Please wait...</span>
                    </button>

                </form>

                @if ($paymentSent === "true")
                <button class="btn btn-warning" wire:click="checkPayment" wire:loading.attr="disabled">
                    <span wire:loading.remove>Check your initiated payment</span>
                    <span wire:loading>Checking...</span>
                </button>
                @endif

                @if ($submitting === "true")
                <div>
                    <div class="mt-3 alert alert-info">
                        Processing your payment. Please wait...
                    </div>
                </div>

                @endif

            </div>

        </div>
        <livewire:footer />
</div>