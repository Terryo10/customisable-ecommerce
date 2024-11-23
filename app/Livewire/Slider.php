<?php

namespace App\Livewire;

use App\Models\Sliders;
use Livewire\Component;

class Slider extends Component
{
    public function render()
    {
        return view('livewire.slider', ['sliders' => Sliders::get()]);
    }
}
