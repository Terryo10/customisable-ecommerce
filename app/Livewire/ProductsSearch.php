<?php

namespace App\Livewire;

use App\Models\Branches;
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
        $branches = Branches::all();

        return view('livewire.products-search', ['products_search' => Products::where('name', 'LIKE', '%' . $this->search . '%')->paginate(20), 'branches' => $branches])->extends('app');
    }
}
