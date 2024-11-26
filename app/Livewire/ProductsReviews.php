<?php

namespace App\Livewire;

use Livewire\Component;

class ProductsReviews extends Component
{
    public $product;
    public function render()
    {
        return view('livewire.products-reviews');
    }
}
