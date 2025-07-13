<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('shipping', function (Blueprint $table) {
            $table->bigIncrements('id');
    $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
    $table->string('shipping_address');
    $table->date('shipping_date');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping');
    }
};
