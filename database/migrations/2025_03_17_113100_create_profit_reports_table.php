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
        Schema::create('profit_reports', function (Blueprint $table) {
            $table->id();
            $table->string('job_card_number');
            $table->decimal('total_cost', 10, 2);
            $table->decimal('parts_cost', 10, 2);
            $table->decimal('labor_charge', 10, 2);
            $table->decimal('total_expense', 10, 2);
            $table->decimal('profit', 10, 2);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profit_reports');
    }
};
