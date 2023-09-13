<?php

namespace App\Http\Livewire\Incomes;

use Livewire\Component;

class Delete extends Component
{
    public $user;

    public function remove()
    {
       
        $this->user->delete();
        session()->flash('message',true);
        sleep(1);


    }

    public function render()

    {
       
        return view('livewire.incomes.delete' ,[
            'user' => $this->user
        ]);
    }
}
