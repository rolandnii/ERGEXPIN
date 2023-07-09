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
        // Schema::create('incomes', function (Blueprint $table) {
        //     $table->uuid('id')->primary()->index('incId');
        //     $table->string('inc_title');
        //     $table->longText('inc_description')->nullable();
        //     $table->foreignUuid('user_id')->constrained('users', 'id');
        //     $table->foreignUuid('inc_type')->constrained(
        //         table: 'income_types',
        //         indexName: 'incType'
        //     );
        //     $table->timestamps();
        //     $table->softDeletes();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('incomes');
    }
};
