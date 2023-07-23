<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ExpenseType;
use App\Models\IncomeType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        

        IncomeType::upsert([
            [
                "label" => "Salary",
                "icon" => "sale",
            ],
            [
                "label" => "Freelance",
                "icon" => "wallet-membership",
            ],
            [
                "label" => "Gift",
                "icon" => "gift",
            ],
            [
                "label" => "Other",
                "icon" => "zipbox",
            ],

        ],['label'],['icon']);
    }
}
