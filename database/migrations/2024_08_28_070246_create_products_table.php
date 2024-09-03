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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->date('action_date')->nullable();

            $table->integer('category_id')->unsigned();
            $table->integer('sub_category_id')->unsigned();

            $table->string('title');
            $table->string('slug');
            $table->string('brand_id')->nullable();
            $table->double('old_price')->nullable();
            $table->double('price')->nullable();
            $table->integer('quantity')->nullable();

            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->text('additional_information')->nullable();
            $table->text('shipping_return')->nullable();

            $table->tinyInteger('created_by');
            $table->tinyInteger('order_level')->nullable();
            $table->integer('status')->default(0)->comment('0=active,1=inactive');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
