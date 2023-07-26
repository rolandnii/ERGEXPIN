<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function __construct() {
        
    }

    public function ShowDashboard()
    {
        return view('dashboard');
    }

    public function ShowExpense()
    {
        return view("modules.normal.expense.index");
    }

    public function ShowAddExpense()
    {
        return view("modules.normal.expense.expense_add");
    }
}
