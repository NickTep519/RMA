<?php

namespace App\Livewire;

use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Tenants extends Component
{

    public $search = '' ; 

    public $annee = '2024' ; 
    public $mois ;  

    public function render()
    {
        return view('livewire.tenants', [
            'tenants' => Tenant::whereYear('created_at', $this->annee)->with('property')->where('user_id', Auth::id())->where('name', 'LIKE', "%{$this->search}%")->get()
        ]);
    }
}
