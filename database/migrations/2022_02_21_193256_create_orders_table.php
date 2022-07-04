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
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('legal_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('army_no')->nullable();

            $table->timestamp('order_date');
            $table->string('payment_method')->default('pouzecem');
            $table->string('shipping_address')->nullable();
            $table->string('shipping_from')->default('Bitoljska 20, Beograd');
            $table->string('name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('phone')->nullable();
            $table->text('comments')->nullable();
            $table->string('price')->nullable();


            $table->string('cart_id')->nullable();
            $table->string('article_name')->nullable();
            $table->string('prod_qty')->nullable();

            $table->timestamps();
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
