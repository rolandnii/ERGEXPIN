<?php

namespace App\Http\Livewire\Incomes;

use Livewire\Component;

class View extends Component
{
    public $user;
    
    public function render()
    {
        return view('livewire.incomes.view');
    }
}
