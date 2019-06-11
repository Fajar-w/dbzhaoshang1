<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id');
            $table->integer('user_id');
            $table->integer('goodpost')->default(0);;
            $table->integer('is_hidden')->default(0);
            $table->text('content');
            $table->ipAddress('ip');
            $table->timestamps();
            $table->index('archive_id');
            $table->index('user_id');
            $table->index('goodpost');
            $table->index('is_hidden');
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
        Schema::dropIfExists('comments');
    }
}
