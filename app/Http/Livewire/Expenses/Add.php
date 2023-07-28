<?php

namespace App\Http\Livewire\Expenses;

use App\Models\Expense;
use App\Models\ExpenseIncome;
use Livewire\Component;
use App\Models\ExpenseType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Add extends Component
{
    public $title;
    public $amount;
    public $category;
    public $description;

    protected $rules = [
        'title' => ["required"],
        "amount" => ["required",'numeric'],
        "category" => ["required"],
        "description" => ["nullable"]
    ];

    protected $messages = [
        'title.required' => 'The title cannot be empty.',
        'amount.required' => 'The amount cannot be empty',
        'category.required' => 'The category cannot be empty',
        // 'description.required' => 'The desc cannot be empty',

    ];

    public function back(){
        return redirect('expense');
    }

    public function save()
    {
       
        $validated =  $this->validate();
    

        $expense = Expense::create([
            "exp_title" =>$validated["title"],
            "exp_description" => $validated['description'],
            "user_id" => request()->user()->id,
            "exp_amount" => $validated['amount'],
            "exp_type" => $validated['category']
        ]);
        ExpenseIncome::create([
            "exp_id" => $expense->id
        ]);
        session()->flash('message', $validated['amount']);
        $this->reset();
    }

    public function render()
    {
        return view('livewire.expenses.add' ,[
            "expenses" => ExpenseType::all(),
        ]);
    }
}
