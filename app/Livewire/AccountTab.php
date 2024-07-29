<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AccountTab extends Component
{
    public function render()
    {
        return view('livewire.account-tab', [
            'user' => Auth::user(), 
        ]);
    }
}
