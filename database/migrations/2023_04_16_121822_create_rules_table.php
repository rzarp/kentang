<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("parent")->nullable();
            $table->foreign('parent')->references('id')->on('rules');

            $table->unsignedBigInteger("quest");
            $table->foreign('quest')->references('id')->on('quests');

            $table->unsignedBigInteger("yes")->nullable();
            $table->foreign('yes')->references('id')->on('quests');

            $table->unsignedBigInteger("no")->nullable();
            $table->foreign('no')->references('id')->on('quests');

            $table->string('hipotesa')->nullable();

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
        Schema::dropIfExists('rules');
    }
}
