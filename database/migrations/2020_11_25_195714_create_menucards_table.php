<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenucardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menucards', function (Blueprint $table) {
            $table->id();
            $table->timestamp('first_day');
            $table->timestamp('last_day');
            $table->boolean('online')->default(false);
            $table->text('content');

            $table->foreignId('menu_type_id');
            $table->foreign('menu_type_id')->references('id')->on('menu_types');

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
        Schema::dropIfExists('menucards');
    }
}
