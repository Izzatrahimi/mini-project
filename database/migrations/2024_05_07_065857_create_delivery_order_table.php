<?php

// create_delivery_order_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryOrderTable extends Migration
{
    public function up()
    {
        Schema::create('delivery_orders', function (Blueprint $table) {
            $table->id();
            $table->string('sales_order_no');
            $table->foreignId('user_id')->constrained();
            $table->enum('status', ['completed', 'shipping']);
            $table->enum('confirmation', ['received', 'pending']);
            $table->date('delivery_order_date');
            $table->string('tracking_no')->nullable();
            $table->foreignId('courier_id')->nullable()->constrained(); // Assuming you have a couriers table
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('delivery_orders');
    }
}

