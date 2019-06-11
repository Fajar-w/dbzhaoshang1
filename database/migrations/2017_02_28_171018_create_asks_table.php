<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->text('body');
            $table->integer('viewnum')->default(0);
            $table->integer('answernum')->default(0);
            $table->integer('is_hidden')->default(0);
            $table->ipAddress('ip');
            $table->string('tags');
            $table->integer('goodpost')->default(0);
            $table->integer('mid')->default(0);
            $table->timestamps();
            $table->index('user_id');
            $table->index('viewnum');
            $table->index('answernum');
            $table->index('is_hidden');
            $table->index('goodpost');
            $table->index('mid');
            $table->index('ip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asks');
    }
}
