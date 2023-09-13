<?php

namespace App\Http\Livewire\Incomes;

use Livewire\Component;
use App\Models\ExpenseType;
use App\Models\ExpenseIncome;
use App\Models\Income;
use App\Models\IncomeType;

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
       
        sleep(1);
        $validated =  $this->validate();
    

        $income = Income::create([
            "inc_title" =>$validated["title"],
            "inc_description" => $validated['description'],
            "user_id" => request()->user()->id,
            "inc_amount" => $validated['amount'],
            "inc_type" => $validated['category']
        ]);
        ExpenseIncome::create([
            "inc_id" => $income->id
        ]);
        session()->flash('message', $validated['amount']);
        $this->reset();
    }

    public function render()
    {
        return view('livewire.incomes.add' ,[
            "incomes" => IncomeType::all(),
        ]);
    }
}