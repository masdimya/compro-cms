<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_table', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('phone',16);
            $table->string('email');
            $table->string('description');
            $table->string('social_fb');
            $table->string('social_twitter');
            $table->string('social_instagram');






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
        Schema::dropIfExists('setting_table');
    }
}
