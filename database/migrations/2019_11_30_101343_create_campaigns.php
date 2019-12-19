<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('camp_name');
            $table->tinyInteger('camp_status');
            $table->dateTime('autostart_at', 0)->nullable();
            $table->dateTime('started_at', 0)->nullable();
            $table->dateTime('complited_at', 0)->nullable();
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
        Schema::dropIfExists('campaings');
    }
}
