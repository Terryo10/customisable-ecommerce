<?php

namespace App\Livewire;

use App\Models\Orders as ModelsOrders;
use Livewire\Component;

class Orders extends Component
{
    public $title;

    public function render()
    {
        return view('livewire.orders', ['title' => 'Orders', 'orders' => ModelsOrders::get()])->extends('app');
    }
}
