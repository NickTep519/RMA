<?php

namespace App\Livewire;

use App\Models\Contract;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Contracts extends Component
{ 
    public $year;  
    public $month;
    public $day ; 
    public $date_verify ; 
    public $contracts; 
    public $tenant_name; 
    public $isChecked = false;
    public $rental; 
    
    protected $queryString = [
        'tenant_name' => ['except' => ''],
    ]; 

    public function mount()
    {
        $this->year = Carbon::now()->year; 
        $this->month = Carbon::now()->month; 
        $this->day = Carbon::now()->day ;
        $this->tenant_name = '';
        $this->date_verify = Carbon::create(now()->year, now()->month) ;
        $this->rental = NULL ; 

        $this->filterRentals();  
    }

    public function updatedIsChecked($value)
    {

        /*$isRental = Contract::query()
            ->where('user_id', Auth::id())
            ->rentals()
            ->whereYear('month', $this->year)
            ->whereMonth('month', $this->month)
            ->exists() ; */

        if($value) {
            if (true) {
                # code...
            } else {
                # code...
            
            }  
        } else {
            if (true) {
                # code...
            } else {
                # code...
            }
            
        }
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['month', 'year', 'tenant_name'])) {
            $this->filterRentals();
        }
    }
    
    public function filterRentals()
    {
        $this->date_verify = Carbon::create($this->year, $this->month) ; 

        $contracts = $this->contracts = Contract::with(['property', 'rentals' => function ($query) {
            $query->whereYear('month', $this->year)
                  ->whereMonth('month', $this->month)
                  ->latest()
                  ->first() ;
        }])
        ->where('user_id', Auth::id())
        ->where('tenant_name', 'like', "%{$this->tenant_name}%")
        ->get();

        
        $contracts->each(function ($contract) {

            if ($contract->rentals->isEmpty()) {

                if ($this->date_verify->greaterThan($contract->integration_date)) {

                    $contract->rentals()->create([
                        'month' => Carbon::create($this->year, $this->month) , 
                        'payment_status' => false,
                        'prev_payment_status' => false,
                    ]) ; 

                } else {

                    $contract->rentals->push(new Rental([
                        'month' => Carbon::create($this->year, $this->month), 
                        'payment_status' => false,
                        'prev_payment_status' => false,
                    ])) ;

                }  


                $contract->rentals->push(new Rental([
                    'month' => Carbon::create($this->year, $this->month), 
                    'payment_status' => false,
                    'prev_payment_status' => false,
                ])) ;
              
            }

        }) ;



        $conventions =  Contract::query()->where('user_id', Auth::id())->get() ; // $conventions === $contracts


        $conventions->each(function($convention){

            if ($convention->rentals->isEmpty()) {

                $convention->rentals()->create([
                    'month' => now(),
                    'payment_status' => false,
                    'prev_payment_status' => false
                ]) ; 

            }

        }) ; 
            
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


    if ($dateToCheck->lt($now)) {
    echo "La date (mois et année) est avant la date actuelle.";
} else {
    echo "La date (mois et année) n'est pas avant la date actuelle.";
}

    
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