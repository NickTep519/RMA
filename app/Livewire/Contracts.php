<?php

namespace App\Livewire;

use App\Models\Contract;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Contracts extends Component
{ 
    public $tenant_name = '' ; 

    public $year ;  
    public $month  ;
    public $contracts ; 
    
    protected $queryString = [
        'tenant_name' => ['except'=>''],
    ] ; 
    
    public function mount() {

        $this->year = Carbon::now()->year ; 
        $this->month = Carbon::now()->month ; 
        $this->filterRentals() ;  
    }


    public function updated($propertyName)
    {
        if ($propertyName == 'month' || $propertyName == 'year') {
            $this->filterRentals();
        }
    }
    

    public function filterRentals() {

        $this->contracts = Contract::where('user_id', Auth::id())->
                                    where('tenant_name', 'LIKE', "%{$this->tenant_name}%")->
                                    whereYear('created_at', $this->year)-> 
                                    whereMonth('created_at', $this->month)->
                                    with(['property', 'rentals' => function ($query) {
                                            $query->whereYear('month', $this->year)->
                                                    whereMonth('month', $this->month) ;

                                }])->get() ;
    }

    public function render()
    {
        return view('livewire.contracts', [
            'contracts' => $this->contracts
        ]);
    }
}