<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
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
        $users = DB::table('users')
         ->when( $this->category == "active" ,function ($query){
             return $query->where("deleted_at", null);
         })
         ->when( $this->category == "deleted" ,function ($query){
            return $query->where("deleted_at",'!=' , null);
        })
         ->when( $this->search ,function ($query){
             return $query->where("name", "like","%".$this->search ."%")
             ->orWhere("email","like","%".$this->search ."%")
             ->orWhere("user_type","like","%".$this->search ."%");
             ;
         })
         ->orderBy("created_at","desc")
         ->paginate(8);
        return view('livewire.user.table' , [
            "users" => $users
        ]);
    }
}
