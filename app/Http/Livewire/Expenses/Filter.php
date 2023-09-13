<?php

namespace App\Http\Livewire\Expenses;

use App\Models\Expense;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Filter extends Component
{
    public $date;
    public $amount;
    protected $rules  = [
        "date" => 'nullable',
        "amount" => 'nullable',

    ];

    public function mount()
    {
        $this->amount = Expense::where("user_id", auth()->user()->id)->sum("exp_amount");
    }

    public function updatedDate($newUpdate)
    {
       
        sleep(1);
        switch ($newUpdate) {
            case 'today':
                $this->amount = Expense::where("user_id", auth()->user()->id)
                    ->whereDate("created_at", date("Y-m-d"))
                    ->sum("exp_amount");

                break;
            case 'yesterday':
                $this->amount = Expense::where("user_id", auth()->user()->id)
                    ->whereDate("created_at", date("Y-m-d", strtotime('-1 day', strtotime(date('Y-m-d')))))
                    ->sum("exp_amount");
                break;

            case 'last 7':
                $this->amount = Expense::where("user_id", auth()->user()->id)
                ->whereBetween(DB::raw("DATE(created_at)"), [date("Y-m-d", strtotime('-7 days', strtotime(date('Y-m-d')))),date('Y-m-d') ])
                ->sum("exp_amount");
                break;
            case 'last 30':
                $this->amount = Expense::where("user_id", auth()->user()->id)
                ->whereBetween(DB::raw("DATE(created_at)"), [date("Y-m-d", strtotime('-30 days', strtotime(date('Y-m-d')))),date('Y-m-d') ])
                ->sum("exp_amount");
                break;
            case 'this month':
                $this->amount = Expense::where("user_id", auth()->user()->id)
                    ->whereMonth("created_at", date("m"))
                    ->sum("exp_amount");
                break;
            case 'last month':
                $this->amount = Expense::where("user_id", auth()->user()->id)
                    ->whereMonth("created_at", date("m", strtotime('-1 month', strtotime(date('Y-m-d')))))
                    ->sum("exp_amount");
                break;
            default:
                $this->amount = Expense::where("user_id", auth()->user()->id)->sum("exp_amount");
                break;
        }
    }
    public function render()
    {
        return view('livewire.expenses.filter');
    }
}
