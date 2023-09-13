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
        Schema::table('incomes', function (Blueprint $table) {
            // $table->id('id')->index('incId');
            // $table->string('inc_title');
            // $table->longText('inc_description')->nullable();
            // $table->foreignUuid('user_id')->constrained('users', 'id');
            // $table->foreignId('inc_type')->constrained(
            //     table: 'income_types',
            //     indexName: 'incType'
            // );
            // $table->timestamps();
            // $table->softDeletes();
            $table->after("inc_description",function (Blueprint $table){
                $table->decimal("inc_amount",10,2);
            });

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('incomes');
    }
};
