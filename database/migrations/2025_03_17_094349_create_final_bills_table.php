<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('final_bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_card_id');
            $table->string('customer_name');
            $table->string('contact_number');
            $table->string('vehicle_registration_number');
            $table->text('service_details');
            $table->decimal('parts_cost', 10, 2)->default(0);
            $table->decimal('labor_charge', 10, 2)->default(0);
            $table->decimal('total_cost', 10, 2)->default(0);
            $table->decimal('advance_payment', 10, 2)->nullable();
            $table->decimal('remaining_amount', 10, 2)->nullable();
            $table->timestamps();
    
            $table->foreign('job_card_id')->references('id')->on('job_cards')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_bills');
    }
};
