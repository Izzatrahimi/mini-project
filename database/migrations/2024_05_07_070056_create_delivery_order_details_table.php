<?php

// create_delivery_order_details_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryOrderDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('delivery_order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('delivery_order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained(); // Assuming you have a products table
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('delivery_order_details');
    }
}
