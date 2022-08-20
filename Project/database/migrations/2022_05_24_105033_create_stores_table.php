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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('store_name');
            $table->string('store_adress');
            $table->string('store_contact');
            $table->string('store_email');
            $table->string('store_name_slug');
            $table->text('store_descp_en')->nullable();
            $table->text('store_descp_fr')->nullable();
            $table->string('store_thambnail');
            $table->string('store_verif')->nullable();
            $table->integer('raiting')->default(0);
            $table->integer('status')->default(0);
            $table->integer('type')->default(0);
            $table->timestamp('expiry_date')->nullable();
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
        Schema::dropIfExists('stores');
    }
};
