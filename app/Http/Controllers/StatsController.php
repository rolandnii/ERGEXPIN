<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StatsController extends Controller
{
    public function IncomeAndExpense($user): JsonResponse
    {
        try {
            $expense = [];
            $income  = [];
            $label = [];

            //Days filterfing start here
            if (request('filter') == 'days') {
                $today = today();
                $last_14_days = today()->subDays(12)->addDay();
                $nextDate = $last_14_days;
                $income_amounts = [];
                $expense_amounts = [];
                $days = [];

                while ($nextDate->lte($today)) {
                    //fetching total amount for each day
                    $perDayIncome = Income::where("user_id", $user)
                        ->where(DB::raw("DATE(created_at)"), date("Y-m-d", strtotime($nextDate)))
                        ->sum("inc_amount");
                    $perDayExpense = Expense::where("user_id", $user)
                        ->where(DB::raw("DATE(created_at)"), date("Y-m-d", strtotime($nextDate)))
                        ->sum("exp_amount");

                    //Saving both the amount per day and the date to their respective arrays
                    array_push($income_amounts, number_format($perDayIncome, 2, '.'));

                    array_push($expense_amounts, number_format($perDayExpense, 2, '.'));

                    array_push($days, date("j M", strtotime($nextDate)));



                    //increment the date
                    $nextDate = Carbon::parse($nextDate)->addDay();
                }

                $income = [
                    "amounts"  => $income_amounts,
                ];

                $expense = [
                    "amounts" => $expense_amounts,
                ];

                $label = [
                    "days" => $days,
                ];
            }
            //end here


            //Months filterfing start here
            if (request('filter') == 'months') {
                $today = today();
                $last_12_months = today()->subMonths(12)->addMonth();
                $nextMonth = $last_12_months;
                $income_amounts = [];
                $expense_amounts = [];
                $days = [];

                while ($nextMonth->lte($today)) {
                    //fetching total amount for each day
                    $perDayIncome = Income::where("user_id", $user)
                        ->where(DB::raw("MONTH(created_at)"), date("m", strtotime($nextMonth)))
                        ->sum("inc_amount");
                    $perDayExpense = Expense::where("user_id", $user)
                        ->where(DB::raw("MONTH(created_at)"), date("m", strtotime($nextMonth)))
                        ->sum("exp_amount");

                    //Saving both the amount per day and the date to their respective arrays
                    array_push($income_amounts, number_format($perDayIncome, 2, '.'));

                    array_push($expense_amounts, number_format($perDayExpense, 2, '.'));

                    array_push($days, date("M Y", strtotime($nextMonth)));


                    //increment the month
                    $nextMonth = Carbon::parse($nextMonth)->addMonth();
                }

                $income = [
                    "amounts"  => $income_amounts,
                ];

                $expense = [
                    "amounts" => $expense_amounts,
                ];

                $label = [
                    "days" => $days,
                ];
            }
            //end here

            //years filtering starts here
            if (request('filter') == 'years') {
                $today = today();
                $last_6_years = today()->subYears(6)->addYear();
                $nextYear = $last_6_years;
                $income_amounts = [];
                $expense_amounts = [];
                $days = [];

                while ($nextYear->lte($today)) {
                    //fetching total amount for each day
                    $perDayIncome = Income::where("user_id", $user)
                        ->where(DB::raw("YEAR(created_at)"), date("Y", strtotime($nextYear)))
                        ->sum("inc_amount");
                    $perDayExpense = Expense::where("user_id", $user)
                        ->where(DB::raw("YEAR(created_at)"), date("Y", strtotime($nextYear)))
                        ->sum("exp_amount");

                    //Saving both the amount per day and the date to their respective arrays
                    array_push($income_amounts, number_format($perDayIncome, 2, '.'));

                    array_push($expense_amounts, number_format($perDayExpense, 2, '.'));

                    array_push($days, date("Y", strtotime($nextYear)));


                    //increment the year
                    $nextYear = Carbon::parse($nextYear)->addYear();
                }

                $income = [
                    "amounts"  => $income_amounts,
                ];

                $expense = [
                    "amounts" => $expense_amounts,
                ];

                $label = [
                    "days" => $days,
                ];
            }
            //end here




            return response()->json([
                "ok" => true,
                "income" => $income,
                "expense" => $expense,
                "label" => $label,
            ]);


        } catch (Exception $th) {
            Log::error($th->getMessage());
            return response()->json([
                "ok" => false,
                "income" => [],
                "expense" => [],
            ],500);
        }
    }
}
