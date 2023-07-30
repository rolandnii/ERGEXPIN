<?php

namespace App\Http\Livewire\Expenses;

use App\Models\Expense;
use App\Models\ExpenseIncome;
use Livewire\Component;
use App\Models\ExpenseType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Update extends Component
{
    public $title;
    public $amount;
    public $category;
    public $description;
    public $user;

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

    public function mount()
    {
        $this->title = $this->user->exp_title;
        $this->amount = $this->user->exp_amount;
        $this->category = $this->user->exp_type;
        $this->description = $this->user->exp_description;
    }

    public function save()
    {
        $validated =  $this->validate();
    
        $expense = $this->user->update([
            "exp_title" =>$validated["title"],
            "exp_description" => $validated['description'],
            "user_id" => request()->user()->id,
            "exp_amount" => $validated['amount'],
            "exp_type" => $validated['category']
        ]);
        session()->flash('message','ok');
    }

    public function render()

    {
       
        return view('livewire.expenses.update' ,[
            "expenses" => ExpenseType::all(),
            'user' => $this->user
        ]);
    }
}
