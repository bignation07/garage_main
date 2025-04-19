<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('drawback_parts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('drawback_list_id')->constrained()->onDelete('cascade');
            $table->string('issue_name');
            $table->string('spare_part_needed');
            $table->string('part_number')->nullable();
            $table->decimal('estimated_cost', 10, 2)->nullable();
            $table->enum('parts_availability', ['In Stock', 'Ordered', 'Not Available']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('drawback_parts');
    }
};
