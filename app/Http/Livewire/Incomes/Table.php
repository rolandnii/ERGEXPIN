<?php

namespace App\Http\Livewire\Incomes;

use App\Models\Income;
use Livewire\Component;
use App\Models\IncomeType;
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
         $incomes = Income::join("income_types", "incomes.inc_type", "income_types.id")
         ->select(
             "incomes.*",
             "income_types.label",
             "income_types.icon",
         )
         ->when( $this->category ,function ($query){
             return $query->where("income_types.label", $this->category);
         })
         ->when( $this->search ,function ($query){
             return $query->where("incomes.inc_title", "like","%".$this->search ."%")
             ->orWhere("incomes.inc_amount","like","%".$this->search ."%");
             ;
         })
         ->where("incomes.user_id",auth()->user()->id)
         ->orderBy("created_at","desc")
         ->paginate(6);
 
         return view('livewire.incomes.table',
         [
             "incomes"  => $incomes,
             "categories" => IncomeType::all(),
         ]
     );
 
     }
 }
 
