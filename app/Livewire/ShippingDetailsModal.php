<?php

namespace App\Livewire;

use App\Models\ShippingAddress;
use Livewire\Component;

class ShippingDetailsModal extends Component
{
    public $post_id;
    public $user_id;

    public function render()
    {
        return view('livewire.shipping-details-modal', ['profile' => ShippingAddress::where('user_id', $this->user_id)->latest()->first()]);
    }
}
