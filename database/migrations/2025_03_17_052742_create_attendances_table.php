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
    //     Schema::create('attendances', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });

    // }
    public function up()
{
    Schema::create('attendances', function (Blueprint $table) {
        $table->id();
        $table->string('employee_name');
        $table->string('employee_id');
        $table->date('date');
        $table->time('check_in_time')->nullable();
        $table->time('check_out_time')->nullable();
        $table->integer('total_working_hours')->nullable();
        $table->string('breaks_taken')->nullable();
        $table->enum('leave_status', ['Present', 'Absent', 'Half-day'])->default('Present');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
