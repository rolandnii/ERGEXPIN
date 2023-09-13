<?php

namespace App\Http\Livewire\Incomes;

use App\Models\Income;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

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
        $this->amount = Income::where("user_id", auth()->user()->id)->sum("inc_amount");
    }

    public function updatedDate($newUpdate)
    {
        sleep(1);
        switch ($newUpdate) {
            case 'today':
                $this->amount = Income::where("user_id", auth()->user()->id)
                    ->whereDate("created_at", date("Y-m-d"))
                    ->sum("inc_amount");
                break;
            case 'yesterday':
                $this->amount = Income::where("user_id", auth()->user()->id)
                    ->whereDate("created_at", date("Y-m-d", strtotime('-1 day', strtotime(date('Y-m-d')))))
                    ->sum("inc_amount");
                break;

            case 'last 7':
                $this->amount = Income::where("user_id", auth()->user()->id)
                ->whereBetween(DB::raw("DATE(created_at)"), [date("Y-m-d", strtotime('-7 days', strtotime(date('Y-m-d')))),date('Y-m-d') ])
                ->sum("inc_amount");
                break;
            case 'last 30':
                $this->amount = Income::where("user_id", auth()->user()->id)
                ->whereBetween(DB::raw("DATE(created_at)"), [date("Y-m-d", strtotime('-30 days', strtotime(date('Y-m-d')))),date('Y-m-d') ])
                ->sum("inc_amount");
                break;
            case 'this month':
                $this->amount = Income::where("user_id", auth()->user()->id)
                    ->whereMonth("created_at", date("m"))
                    ->sum("inc_amount");
                break;
            case 'last month':
                $this->amount = Income::where("user_id", auth()->user()->id)
                    ->whereMonth("created_at", date("m", strtotime('-1 month', strtotime(date('Y-m-d')))))
                    ->sum("inc_amount");
                break;
            default:
                $this->amount = Income::where("user_id", auth()->user()->id)->sum("inc_amount");
                break;
        }
    }
    public function render()
    {
        return view('livewire.incomes.filter');
    }
}
