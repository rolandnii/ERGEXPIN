<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Filter extends Component
{
    public $totalUsers;
    public $date;
    public function mount()
    {
        $this->totalUsers = User::withTrashed()
        ->count();
    }

    public function updatedDate($newUpdate)
    {
        sleep(1);
        switch ($newUpdate) {
            case 'today':
                $this->totalUsers = User::withTrashed()
                 ->whereDate("created_at", date("Y-m-d"))
                    ->count();
                break;
            case 'yesterday':
                $this->totalUsers = User::withTrashed()
                ->whereDate("created_at", date("Y-m-d", strtotime('-1 day', strtotime(date('Y-m-d')))))
                    ->count();
                break;

            case 'last 7':
                $this->totalUsers = User::withTrashed()
                ->whereBetween(DB::raw("DATE(created_at)"), [date("Y-m-d", strtotime('-7 days', strtotime(date('Y-m-d')))),date('Y-m-d') ])
                ->count();
                break;
            case 'last 30':
                $this->totalUsers = User::withTrashed()
                ->whereBetween(DB::raw("DATE(created_at)"), [date("Y-m-d", strtotime('-30 days', strtotime(date('Y-m-d')))),date('Y-m-d') ])
                ->count();
                break;
            case 'this month':
                $this->totalUsers = User::withTrashed()
                ->whereMonth("created_at", date("m"))
                    ->count();
                break;
            case 'last month':
                $this->totalUsers = User::withTrashed()
                ->whereMonth("created_at", date("m", strtotime('-1 month', strtotime(date('Y-m-d')))))
                    ->count();
                break;
            default:
                $this->totalUsers = User::withTrashed()
                ->count();
                break;
        }
    }
    public function render()
    {
        return view('livewire.user.filter');
    }
}
