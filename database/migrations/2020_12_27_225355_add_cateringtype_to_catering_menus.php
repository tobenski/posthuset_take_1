<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCateringtypeToCateringMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('catering_menus', function (Blueprint $table) {
            $table->foreignId('catering_type_id')->nullable();
            $table->foreign('catering_type_id')->references('id')->on('catering_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('catering_menus', function (Blueprint $table) {
            //
        });
    }
}
