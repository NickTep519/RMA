<?php

namespace App\Livewire;

use Livewire\WithPagination;
use App\Models\Rental;
use Livewire\Component;

class Rentals extends Component
{

    public $contract ; 
    public $rentals ; 

    public function mount($contract) {
        $this->contract = $contract ; 
        $this->query() ; 
    }

    public function query() {
        $this->rentals = Rental::query()
        ->where('contract_id', $this->contract->id)->get() ; 
    }

    public function render()
    {
        return view('livewire.rentals', [
            'rentals' => $this->rentals
        ]);
    }
}