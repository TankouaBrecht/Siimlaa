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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id')->nullable();
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('product_name_fr');
            $table->string('product_slug_fr');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tags_fr')->nullable();;
            $table->string('product_size_fr')->nullable();
            $table->string('product_color_fr')->nullable();
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->longText('long_descp_fr');
            $table->string('specification_fr')->nullable();
            $table->string('product_thambnail');
             $table->integer('status')->default(0);
            $table->integer('stock')->default(0);
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
        Schema::dropIfExists('products');
    }
};
