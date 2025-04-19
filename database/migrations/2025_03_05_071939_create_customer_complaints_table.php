<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('customer_complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_checkin_id')->constrained()->onDelete('cascade');
            $table->text('description');
            $table->enum('complaint_type', ['Mechanical', 'Electrical', 'Body', 'AC', 'Performance', 'Others']);
            $table->boolean('previous_repairs_done')->default(false);
            $table->enum('urgency_level', ['High', 'Medium', 'Low']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer_complaints');
    }
};
