<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name');
            $table->timestamp('date');
            $table->timestamp('time');
            $table->integer('duration')->nullable();
            $table->text('content')->nullable();
            $table->text('content2')->nullable();
            $table->integer('price')->default(0);
            $table->boolean('online')->default(true);

            $table->string('button_text')->default('Book Bord');
            $table->string('button_link')->default('/');

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
        Schema::dropIfExists('events');
    }
}
