<?php

namespace App\Livewire;

use App\Models\Products as ModelsProducts;
use Livewire\Component;

class Products extends Component
{
    public function render()
    {
        $products = ModelsProducts::paginate(10);
        return view('livewire.products', compact('products'));
    }
}
