<?php

namespace App\Livewire;

use App\Models\Branches;
use App\Models\Orders;
use App\Models\Products as ModelsProducts;
use App\Models\ShopAvailability;
use Livewire\Component;

class Products extends Component
{
    public Orders $order;

    protected $rules = [
        'order.quantity' => 'required',
        'order.fields' => 'required',
    ];

    public function placeOrder()
    {
        // $this->validate();

        // $this->order->save();

        session()->flash('message', 'Post successfully updated.');

        return redirect()->to('/orders');
    }

    public function render()
    {
        $products = ModelsProducts::latest()->paginate(10);
        $availabity = ShopAvailability::latest()->first();
        $branches = Branches::all();
        return view('livewire.products', compact('products', 'availabity', 'branches'));
    }
}
