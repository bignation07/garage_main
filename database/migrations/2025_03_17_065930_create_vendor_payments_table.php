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
    //     Schema::create('vendor_payments', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }


    public function up()
{
    Schema::create('vendor_payments', function (Blueprint $table) {
        $table->id();
        $table->string('vendor_name');
        $table->string('invoice_number');
        $table->date('purchase_date');
        $table->text('parts_list');
        $table->decimal('total_cost', 10, 2);
        $table->enum('payment_status', ['Pending', 'Paid'])->default('Pending');
        $table->enum('payment_method', ['Bank Transfer', 'UPI', 'Cash']);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_payments');
    }
};
