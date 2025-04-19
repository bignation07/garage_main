<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('work_starts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_card_id')->constrained()->onDelete('cascade');
            $table->dateTime('start_date_time');
            $table->string('mechanic_assigned');
            $table->string('parts_purchased')->nullable();
            $table->string('vendor_name')->nullable();
            $table->string('invoice_details')->nullable();
            $table->decimal('total_parts_cost', 10, 2)->nullable();
            $table->decimal('estimated_service_charge', 10, 2)->nullable();
            $table->decimal('margin_calculation', 10, 2)->nullable(); // Selling Price - Purchase Price
            $table->enum('status', ['In Progress', 'Completed', 'Delivered'])->default('In Progress');
            $table->boolean('customer_notification_sent')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('work_starts');
    }
};
