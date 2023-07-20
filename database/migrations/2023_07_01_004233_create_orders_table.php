<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('products_id');
            $table->date('delivery_date')->nullable();
            $table->integer('quantity')->nullable()->default(1);
            $table->longText('note')->nullable();
            $table->integer('status')->default(0);
            $table->decimal('amount', 11, 2)->default(0);

            $table->string('customer')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
