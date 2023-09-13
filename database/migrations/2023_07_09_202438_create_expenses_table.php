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
        Schema::table('expenses', function (Blueprint $table) {
            // $table->id('id')->index('expId');
            // $table->string('exp_title');
            // $table->longText('exp_description')->nullable();
            // $table->foreignUuid('user_id')->constrained('users', 'id');
            // $table->foreignId('exp_type')->constrained('expense_types', 'id');
            // $table->timestamps();
            // $table->softDeletes();
            $table->after("exp_description",function (Blueprint $table){
                $table->decimal("exp_amount",10,2);
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('expenses');
    }
};
