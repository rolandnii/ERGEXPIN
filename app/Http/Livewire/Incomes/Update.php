<?php

namespace App\Http\Livewire\Incomes;

use App\Models\IncomeType;
use Livewire\Component;

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
        $this->title = $this->user->inc_title;
        $this->amount = $this->user->inc_amount;
        $this->category = $this->user->inc_type;
        $this->description = $this->user->inc_description;
    }

    public function save()
    {
        sleep(1);
        $validated =  $this->validate();
        $expense = $this->user->update([
            "inc_title" =>$validated["title"],
            "inc_description" => $validated['description'],
            "inc_amount" => $validated['amount'],
            "inc_type" => $validated['category']
        ]);
        session()->flash('message','ok');
    }

    public function render()

    {
       
        return view('livewire.incomes.update' ,[
            "incomes" => IncomeType::all(),
            'user' => $this->user
        ]);
    }
}