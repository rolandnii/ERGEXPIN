<?php

namespace App\Http\Livewire\Expenses;

use App\Models\Expense;
use Livewire\Component;
use App\Models\ExpenseType;
use Livewire\WithPagination;

class Table extends Component
{
   use WithPagination;

   public $search;
   public $category;

    public function render()
    {
        $expenses = Expense::join("expense_types", "expenses.exp_type", "expense_types.id")
        ->select(
            "expenses.*",
            "expense_types.label",
            "expense_types.icon",
        )
        ->where("expenses.user_id",auth()->user()->id)
        ->orderBy("created_at","desc")
        ->paginate(6);

        return view('livewire.expenses.table',
        [
            "expenses"  => $expenses,
            "categories" => ExpenseType::all(),
        ]
    );

    }
}
