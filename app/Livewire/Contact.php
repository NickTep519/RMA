<?php

namespace App\Livewire;

use App\Events\ContactEvent;
use Livewire\Component;

class Contact extends Component
{
    public $phone = '' ; 
    public array $datas =  [] ; 

    public function contact() {


        $this->validate([
            'phone' => 'required|string|regex:/^\+(\d{3})\d{8,12}$/'
        ]);

        event(new ContactEvent([])) ; 


        session()->flash('success', 'Message bien envoyé. Le manager vous contactera ulterieurement') ; 
    }


    public function render()
    {
        return view('livewire.contact');
    }
}
