<?php

namespace App\Livewire;

use Livewire\Component;

class ResetPasswordForm extends Component
{
    public $token;

    public function mount($token)
    {
        $this->token = $token;
    }

    public function render()
    {
        return view('livewire.reset-password-form', ['token' => $this->token])->extends('app');
    }
}
