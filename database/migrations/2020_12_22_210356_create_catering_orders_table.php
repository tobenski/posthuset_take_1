<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCateringOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catering_orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamp('date');
            $table->timestamp('time');
            $table->integer('count');

            $table->boolean('delivery');
            $table->string('delivery_name')->nullable();
            $table->string('delivery_address')->nullable();
            $table->integer('delivery_zip')->nullable();
            $table->string('contact_phone')->nullable();


            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->foreignId('catering_menu_id');
            $table->foreign('catering_menu_id')->references('id')->on('catering_menus');

            $table->softDeletes();
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
        Schema::dropIfExists('catering_orders');
    }
}
