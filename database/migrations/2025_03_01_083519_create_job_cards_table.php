<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('job_cards', function (Blueprint $table) {
            $table->id();
            $table->string('job_card_number')->unique();
            $table->unsignedBigInteger('vehicle_checkin_id');
            $table->string('service_advisor');
            $table->string('mechanic');
            $table->date('expected_delivery_date');
            $table->enum('fuel_level', ['Empty', 'Low', 'Half', 'Full']);
            $table->json('vehicle_condition');
            $table->boolean('additional_work')->default(false);
            $table->decimal('estimated_cost', 10, 2);
            $table->decimal('advance_payment', 10, 2)->nullable();
            $table->string('customer_signature')->nullable();
            $table->timestamps();

            $table->foreign('vehicle_checkin_id')->references('id')->on('vehicle_checkins')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_cards');
    }
};
