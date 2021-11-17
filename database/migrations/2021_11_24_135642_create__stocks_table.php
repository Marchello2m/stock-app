<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{

    public function up()
    {
        Schema::create('_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('ticker');
            $table->string('market');
            $table->float('current_price');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('_stocks');
    }
}
