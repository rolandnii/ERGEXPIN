<?php

namespace App\Http\Livewire\Expenses;

use Livewire\Component;

class View extends Component
{
    public $user;

    public function render()
    {
        
        return view('livewire.expenses.view');
    }
}
