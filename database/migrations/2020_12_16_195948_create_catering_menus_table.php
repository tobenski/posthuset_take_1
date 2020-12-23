<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCateringMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catering_menus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->text('menu')->nullable();
            $table->integer('price');

            $table->integer('min_couv')->default(10);
            $table->integer('days_before')->default(8);

            $table->unsignedInteger('order')->nullable();

            $table->foreignId('catering_type_id');
            $table->foreign('catering_type_id')->references('id')->on('catering_types');

            $table->boolean('online')->default(true);
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
        Schema::dropIfExists('catering_menus');
    }
}
