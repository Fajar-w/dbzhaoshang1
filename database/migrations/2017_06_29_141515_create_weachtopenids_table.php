<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeachtopenidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weachtopenids', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscribe')->nullable();
            $table->string('openid')->nullable();
            $table->string('nickname')->nullable();
            $table->integer('sex')->nullable();
            $table->string('language')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->string('headimgurl')->nullable();
            $table->string('subscribe_time')->nullable();
            $table->string('remark')->nullable();
            $table->string('groupid')->nullable();
            $table->string('tagid_list')->nullable();
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
        Schema::dropIfExists('weachtopenids');
    }
}
