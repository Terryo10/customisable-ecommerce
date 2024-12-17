<?php

namespace App\Livewire;

use App\Models\Orders as ModelsOrders;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Orders extends Component
{
    public $title;

    public function render()
    {
        $user_id = Auth::user()->id;
        return view('livewire.orders', ['title' => 'Orders', 'orders' => ModelsOrders::where('user_id', $user_id)->latest()->paginate(10)])->extends('app');
    }
}
