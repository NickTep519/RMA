<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileTab extends Component
{

    public $activeTab ;


    public function mount() {
        $this->activeTab = 'account_tab';
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;

    }

    public function render()
    {
        return view('livewire.profile-tab', [
            'user' => Auth::user(), 
        ]);
    }
}
