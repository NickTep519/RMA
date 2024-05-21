<?php

namespace App\Livewire;

use App\Models\Contract;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Contracts extends Component
{ 
    public $search = '' ; 

    public $annee = 2024 ; 
    public $mois = 05 ;  

    public function render()
    {
        return view('livewire.contracts', [
            'contracts' => Contract::with('rentals')->whereYear('created_at', $this->annee)->
                                    whereMonth('created_at', $this->mois)->
                                    with('property')->
                                    where('user_id', Auth::id())->
                                    where('tenant_name', 'LIKE', "%{$this->search}%")->get(),
        ]);
    }
}