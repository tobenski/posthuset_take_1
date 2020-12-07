<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnbefalerMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anbefaler_menus', function (Blueprint $table) {
            $table->id();
            $table->timestamp('firstday');
            $table->timestamp('lastday');
            $table->string('timeframe')->default('Serveres efter 17.30');
            $table->string('comment')->nullable();
            $table->boolean('online')->default(false);
            $table->string('image')->nullable();


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
        Schema::dropIfExists('anbefaler_menus');
    }
}
