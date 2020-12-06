<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLunchDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lunch_dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content');
            $table->integer('price')->nullable();


            $table->foreignId('frokost_menu_id');
            $table->foreign('frokost_menu_id')
                  ->references('id')->on('frokost_menus')
                  ->cascadeOnDelete()->cascadeOnUpdate();

            $table->unsignedInteger('order')->nullable();

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
        Schema::dropIfExists('lunch_dishes');
    }
}
