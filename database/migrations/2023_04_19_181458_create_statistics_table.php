<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTable extends Migration
{
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->string('code');
            $table->integer('confirmed');
            $table->integer('recovered');
            $table->integer('deaths');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('statistics');
    }
}
