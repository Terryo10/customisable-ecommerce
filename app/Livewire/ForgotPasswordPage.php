<?php

namespace App\Livewire;

use Livewire\Component;

class ForgotPasswordPage extends Component
{
    public $title;
    
    public function render()
    {
        return view('livewire.forgot-password-page')->extends('app');
    }
}
