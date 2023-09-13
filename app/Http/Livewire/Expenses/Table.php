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

   public function updatedCategory()
   {
    $this->resetPage();
   }

   public function updatingSearch()
   {
    $this->resetPage();
   }
    public function render()
    {
        $expenses = Expense::join("expense_types", "expenses.exp_type", "expense_types.id")
        ->select(
            "expenses.*",
            "expense_types.label",
            "expense_types.icon",
        )
        ->when( $this->category ,function ($query){
            return $query->where("expense_types.label", $this->category);
        })
        ->when( $this->search ,function ($query){
            return $query->where("expenses.exp_title", "like","%".$this->search ."%")
            ->orWhere("expenses.exp_amount","like","%".$this->search ."%");
            ;
        })
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
