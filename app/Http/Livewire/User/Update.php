<?php

namespace App\Http\Livewire\User;

use Illuminate\Validation\Rule;
use Livewire\Component;

class Update extends Component
{
    public $name;
    public $email;
    public $usertype;
    public $user;
    public $status;

    protected $rules = [
        'name' => ["required", "string"],
        "email" => ["required", 'email'],
        "usertype" => ["required",],
    ];

    protected $messages = [
        'name.required' => 'The name field cannot be empty.',
        'email.required' => 'The email field cannot be empty',
        'email.email' => 'The email is invalid',
        'usertype.email' => 'The email is invalid',

        // 'description.required' => 'The desc cannot be empty',

    ];


    public function mount()
    {
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->usertype = $this->user->user_type;
        $this->status =  $this->user->deleted_at == null ? "active" : "deleted";
    }


    public function save()
    {
        sleep(1);
        $validated =  $this->validate();
        if ($this->status == "active") {
            
                $this->user->update([
                    "name" => $validated["name"],
                    "email" => $validated['email'],
                    "user_type" => $validated['usertype'],
                ]);;

                $this->user->restore();
            }
        else{
             $this->user->update([
                    "name" => $validated["name"],
                    "email" => $validated['email'],
                    "user_type" => $validated['usertype'],
                ]);
            $this->user->delete();
        }
        session()->flash('message', 'ok');
    }


    public function render()
    {
        return view('livewire.user.update');
    }
}
