<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Managers extends Component
{

    public $user = '' ; 

    protected $queryString = [
        'user' => ['except' => '']
    ] ; 

    public function render()
    {
        return view('livewire.managers', [
            'users'=> User::where('name', 'LIKE', "%{$this->user}%")->paginate(8),
        ]);
    }
}
