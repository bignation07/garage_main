<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('salaries', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }
    public function up()
{
    Schema::create('salaries', function (Blueprint $table) {
        $table->id();
        $table->string('employee_name');
        $table->string('employee_id');
        $table->string('department');
        $table->decimal('basic_salary', 10, 2);
        $table->integer('attendance')->default(0);
        $table->integer('overtime_hours')->default(0);
        $table->decimal('deductions', 10, 2)->default(0.00);
        $table->decimal('net_salary', 10, 2);
        $table->enum('payment_status', ['Pending', 'Paid'])->default('Pending');
        $table->enum('payment_mode', ['Cash', 'Bank Transfer', 'UPI'])->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
