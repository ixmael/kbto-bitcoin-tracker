<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitcoinTrackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitcoin_tracker', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->float('high');
            $table->float('last');
            $table->date('remote_created_at');
            $table->float('low');
            $table->float('ask');
            $table->float('bid');
            $table->string('volume');
            $table->string('vwap');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitcoin_tracker');
    }
}
