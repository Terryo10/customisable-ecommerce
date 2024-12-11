<?php

namespace App\Livewire;

use App\Models\Products;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        $products = Products::latest()->paginate(10);
        return view('livewire.footer', compact('products'));
    }
}
