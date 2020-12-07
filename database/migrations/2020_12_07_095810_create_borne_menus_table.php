<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorneMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borne_menus', function (Blueprint $table) {
            $table->id();
            $table->timestamp('firstday');
            $table->string('timeframe')->default('Serveres hele dagen.');
            $table->string('comment')->default('Servers kun til børn under 14 år.');
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
        Schema::dropIfExists('borne_menus');
    }
}
