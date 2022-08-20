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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id')->nullable();
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('service_name_fr');
            $table->string('service_slug_fr');
            $table->string('service_code');
            $table->string('service_tags_fr')->nullable();;
            $table->string('selling_price');
            $table->longText('long_descp_fr');
            $table->string('specification_fr')->nullable();
            $table->string('service_thambnail');
             $table->integer('status')->default(0);
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
        Schema::dropIfExists('services');
    }
};
