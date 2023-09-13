<?php

namespace App\Http\Livewire\Expenses;

use App\Models\Expense;
use App\Models\ExpenseIncome;
use Livewire\Component;
use App\Models\ExpenseType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
       
        return view('livewire.expenses.delete' ,[
            'user' => $this->user
        ]);
    }
}
