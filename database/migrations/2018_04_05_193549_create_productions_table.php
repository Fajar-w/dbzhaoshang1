<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('typeid');
            $table->integer('mid');
            $table->integer('brandid')->nullable();
            $table->integer('ismake')->default(0);
            $table->string('title')->nullable();
            $table->string('bdname')->nullable();
            $table->string('litpic')->nullable();
            $table->string('price')->nullable();
            $table->string('flags')->nullable();
            $table->integer('click')->nullable();
            $table->string('pdintr')->nullable();
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('productionname')->nullable();
            $table->string('imagepics')->nullable();
            $table->text('body')->nullable();
            $table->string('write');
            $table->smallInteger('dutyadmin');
            $table->timestamps();
            $table->index('typeid');
            $table->index('brandid');
            $table->index('ismake');
            $table->index('title');
            $table->index('flags');
            $table->index('price');
            $table->index('click');
            $table->index('write');
            $table->index('dutyadmin');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productions');
    }
}
