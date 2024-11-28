<?php

namespace App\Livewire;

use App\Models\Products;
use Livewire\Component;

class ProductsSearch extends Component
{
    public $search;

    public function mount($search)
    {
        $this->search = $search;
    }

    public function render()
    {
        return view('livewire.products-search', ['products_search' => Products::where('name', 'LIKE', '%' . $this->search . '%')->paginate(20)])->extends('app');
    }
}
