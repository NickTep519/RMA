<?php

namespace App\Livewire;

use App\Models\Contract;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Contracts extends Component
{ 
    public $year;  
    public $month;
    public $contracts; 
    public $tenant_name; 
    
    protected $queryString = [
        'tenant_name' => ['except' => ''],
    ]; 
    
    public function mount()
    {
        $this->year = Carbon::now()->year; 
        $this->month = Carbon::now()->month; 
        $this->tenant_name = ''; 
        $this->filterRentals();  
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['month', 'year', 'tenant_name'])) {
            $this->filterRentals();
        }
    }
    
    public function filterRentals()
    {
        $this->contracts = Contract::with(['property', 'rentals' => function ($query) {
            $query->whereYear('created_at', $this->year)
                  ->whereMonth('created_at', $this->month);
        }])
        ->where('user_id', Auth::id())
        ->where('tenant_name', 'like', "%{$this->tenant_name}%")
        ->whereYear('created_at', $this->year)
        ->whereMonth('created_at', $this->month)
        ->get();
    }

    public function render()
    {
        return view('livewire.contracts', [
            'contracts' => $this->contracts
        ]);
    }
}


/*namespace App\Livewire;

use App\Models\Contract;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Contracts extends Component
{ 

    public $year ;  
    public $month  ;
    public $contracts ; 
    public $tenant_name ; 

    
    protected $queryString = [
        'tenant_name' => ['except'=>''],
    ] ; 
    
    public function mount() {

        $this->year = Carbon::now()->year ; 
        $this->month = Carbon::now()->month ; 
        $this->tenant_name = '' ; 
        $this->filterRentals() ;  
    }


    public function updated($propertyName)
    {
        if ($propertyName == 'month' || $propertyName == 'year') {
            $this->filterRentals();
        }
    }
    

    public function filterRentals() {

        $this-> contracts = Contract::with(['property',
                                            'rentals'=> function($query){
                                                            $query->whereYear('month', $this->year)
                                                                  ->whereMonth('month', $this->month) ; 
                                                            }])
             -> where('user_id', Auth::id())
             -> where('tenant_name','like',"%{$this->tenant_name}%")
             -> whereYear('created_at', $this->year)
             -> whereMonth('created_at', $this->month)
             -> get() ; 
    }

    public function render()
    {
        return view('livewire.contracts', [
            'contracts' => $this->contracts
        ]);
    }
}*/