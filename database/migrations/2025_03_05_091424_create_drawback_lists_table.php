<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('drawback_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_checkin_id')->constrained()->onDelete('cascade');
            $table->string('issue_name');
            $table->enum('issue_severity', ['Minor', 'Major', 'Critical']);
            $table->text('additional_repairs')->nullable();
            $table->text('mechanic_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('drawback_lists');
    }
};
