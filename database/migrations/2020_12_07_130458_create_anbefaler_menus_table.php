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
            $table->string('comment')->default('Pris ved valg fra "Posthuset Anbefaler" herover<br>3 retter: 329,- | 4 retter: 399,- | 5 retter: 459,-<br>Vinmenu: 3 gl. 199,- | 4 gl. 259,- | 5 gl. 299,-');
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
