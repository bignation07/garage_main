<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('estimated_inspections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_checkin_id')->constrained()->onDelete('cascade');
            $table->text('inspection_report');
            $table->json('issues_identified');
            $table->text('parts_required');
            $table->decimal('estimated_cost', 10, 2);
            $table->enum('approval_status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->enum('customer_approval_method', ['WhatsApp', 'Call', 'Email']);
            $table->datetime('approval_date_time')->nullable();
            $table->string('customer_signature')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estimated_inspections');
    }
};
