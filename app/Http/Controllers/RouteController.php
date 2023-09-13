<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseIncome;
use App\Models\Income;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RouteController extends Controller
{
    public function __construct()
    {
    }

    public function ShowDashboard(): View
    {
        $user = Auth::user();
        if ($user->user_type == "admin") {
            $totalUsers = User::withTrashed()->count("id");
            $expenseRecordings = Expense::count("id");
            $incomeRecordings = Income::count("id");
            $deletedUsers = User::where("deleted_at","!=",null)->withTrashed()->count();
            $activeUsers = User::count();  
            $users = User::withTrashed()->take(5)->orderByDesc("created_at")->get();

            return view('admin', compact("expenseRecordings","totalUsers","incomeRecordings","deletedUsers","activeUsers","users"));
        }



        //User side 
        //Getting values for  the four cards
        $expenses = Expense::where("user_id", $user->id)
            ->sum("exp_amount");
        $income = Income::where("user_id", $user->id)
            ->sum("inc_amount");
        $total = number_format($income + $expenses, 2, ".", ",");
        $net = number_format($income - $expenses, 2, ".", ",");
        $income = number_format($income, 2, ".", ",");
        $expenses = number_format($expenses, 2, ".", ",");

        $recentIncomes = ExpenseIncome::join("incomes", function (JoinClause $join) {
            $join->on("expense_incomes.inc_id", "incomes.id")
                ->where("expense_incomes.inc_id", "!=", null);
        })
            ->join("income_types", "incomes.inc_type", "income_types.id")
            ->select(
                "incomes.inc_title as title",
                "incomes.inc_amount as amount",
                "incomes.created_at as date",
                "income_types.label as category_label",
                "income_types.icon as icon",
                DB::raw("CONCAT('primary') as color"),


            )
            ->where("incomes.deleted_at", null)
            ->where("incomes.user_id", $user->id);

        $recentIncExp = ExpenseIncome::join("expenses", function (JoinClause $join) {
            $join->on("expense_incomes.exp_id", "expenses.id")
                ->where("expense_incomes.exp_id", "!=", null);
        })
            ->join("expense_types", "expenses.exp_type", "expense_types.id")
            ->select(
                "expenses.exp_title as title",
                "expenses.exp_amount as amount",
                "expenses.created_at as date",
                "expense_types.label as category_label",
                "expense_types.icon as icon",
                DB::raw("CONCAT('danger') as color"),
            )
            ->union($recentIncomes)
            ->where("expenses.user_id", $user->id)
            ->where("expenses.deleted_at", null)
            ->orderBy("date", "desc")
            ->take(4)
            ->get()
            ;
        $user_id = $user->id;

        return view('user', compact("total", "net", "income", "expenses", "recentIncExp","user_id"));
    }

    public function RedirectDashboard(): RedirectResponse
    {
        return redirect('dashboard');
    }

    public function ShowExpense(): View
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

    public function ShowAddExpense(): View
    {
        return view("modules.normal.expense.expense_add");
    }

    public function ShowViewExpense(Expense $user): View
    {
        //pending
        return view("modules.normal.expense.expense_view", [
            'user' => $user
        ]);
    }

    public function ShowDeleteExpense(Expense $user): View
    {
        //done
        return view("modules.normal.expense.expense_delete", [
            'user' => $user
        ]);
    }

    public function ShowUpdateExpense(Expense $user): View
    {
        //done
        return view("modules.normal.expense.expense_update", [
            'user' => $user
        ]);
    }


    //incomes
    public function ShowIncome(): View
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


    public function ShowAddIncome(): View
    {
        return view("modules.normal.income.income_add");
    }

    public function ShowViewIncome(Income $user): View
    {
        //pending
        return view("modules.normal.income.income_view", [
            'user' => $user
        ]);
    }

    public function ShowDeleteIncome(Income $user): View
    {
        //
        return view("modules.normal.income.income_delete", [
            'user' => $user
        ]);
    }

    public function ShowUpdateIncome(Income $user): View
    {
        return view("modules.normal.income.income_update", [
            'user' => $user
        ]);
    }


    //Admin Methods
    public function ShowUser(): View
    {
        return view("modules.admin.user.index");
    }


    //User Methods

    public function ShowDeleteUser($user_id) : View
    {
        $user = User::withTrashed()
        ->find($user_id)
       ;
        return view("modules.admin.user.delete", [
            "user" => $user,
        ]);
    }

    public function ShowViewUser($user_id): View
    {
        $user = User::withTrashed()
        ->find($user_id)
        ;
        return view("modules.admin.user.view" ,[
            "user" => $user,
        ]);
    }

    public function ShowUpdateUser($user_id): View
    {
        $user = User::withTrashed()
        ->find($user_id)
        ;
        return view("modules.admin.user.update" ,[
            "user" => $user,
        ]);
    }


}
