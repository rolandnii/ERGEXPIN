<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('expense_incomes', function (Blueprint $table) {
        //     $table->uuid('id')->primary();
        //     $table->foreignUuid('inc_id')->nullable()->constrained(
        //         table: 'incomes',
        //         indexName: 'incId'
        //     )->onDelete('cascade');
        //     $table->foreignUuid('exp_id')->nullable()->constrained(
        //         table: 'expenses',
        //         indexName: 'expId'
        //     )->cascadeOnDelete();
        //     $table->timestamps();
        //     $table->softDeletes();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('expense_incomes');
    }
};
