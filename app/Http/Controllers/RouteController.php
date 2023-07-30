<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class RouteController extends Controller
{
    public function __construct()
    {
    }

    public function ShowDashboard()
    {
        return view('dashboard');
    }

    public function ShowExpense()
    {

        $query = Expense::query();
        $latestExpenses = $query->join("expense_types", "expenses.exp_type", "expense_types.id")
            ->select(
                "expenses.*",
                "expense_types.label",
                "expense_types.icon",
            )
            ->where("expenses.user_id", auth()->user()->id)
            ->orderBy("expenses.created_at", "desc")
            ->limit(4)
            ->get();

        $totalamount = $query->where("expenses.user_id", auth()->user()->id)
            ->sum("exp_amount");
        $stats = DB::table("expenses")->join("expense_types", "expenses.exp_type", "expense_types.id")
            ->select(
                DB::raw("SUM(expenses.exp_amount) as  amount"),
                "expense_types.label",
                // "expense_types.icon",

            )
            ->where("expenses.user_id", auth()->user()->id)
            ->orderBy("amount", "desc")
            ->groupBy("expense_types.label")
            ->where("expenses.deleted_at")
            ->limit(4)
            ->get();
        $expenses = $query
            ->where("expenses.user_id", auth()->user()->id)
            ->orderBy("created_at", "desc")

            ->paginate(6);
        return view("modules.normal.expense.index", compact('latestExpenses', "stats", "totalamount", 'expenses'));
    }

    public function ShowAddExpense()
    {
        return view("modules.normal.expense.expense_add");
    }

    public function ShowViewExpense(Expense $user)
    {
        //pending
        return view("modules.normal.expense.expense_view", [
            'user' => $user
        ]);
    }

    public function ShowDeleteExpense(Expense $user)
    {
        //done
        return view("modules.normal.expense.expense_delete", [
            'user' => $user
        ]);
    }

    public function ShowUpdateExpense(Expense $user)
    {
//done
        return view("modules.normal.expense.expense_update", [
            'user' => $user
        ]);
    }


    //incomes
    public function ShowIncome()
    {

        $query = Income::query();
        $latestIncomes = $query->join("income_types", "incomes.inc_type", "income_types.id")
            ->select(
                "incomes.*",
                "income_types.label",
                "income_types.icon",
            )
            ->where("incomes.user_id", auth()->user()->id)
            ->orderBy("incomes.created_at", "desc")
            ->limit(4)
            ->get();

        $totalamount = $query->where("incomes.user_id", auth()->user()->id)
            ->sum("inc_amount");
        $stats = DB::table("incomes")->join("income_types", "incomes.inc_type", "income_types.id")
            ->select(
                DB::raw("SUM(incomes.inc_amount) as  amount"),
                "income_types.label",
                // "income_types.icon",

            )
            ->where("incomes.user_id", auth()->user()->id)
            ->orderBy("amount", "desc")
            ->groupBy("income_types.label")
            ->where("incomes.deleted_at")
            ->limit(4)
            ->get();
        $incomes = $query
            ->where("incomes.user_id", auth()->user()->id)
            ->orderBy("created_at", "desc")

            ->paginate(6);
        return view("modules.normal.income.index", compact('latestIncomes', "stats", "totalamount", 'incomes'));
    }
}
