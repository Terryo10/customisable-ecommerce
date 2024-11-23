<?php

namespace App\Livewire;

use Livewire\Component;

class Orders extends Component
{
    public $title;

    public function render()
    {
        return view('livewire.orders', ['title'=> 'Orders'])->extends('app');
    }
}
