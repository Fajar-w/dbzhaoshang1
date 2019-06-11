<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandarticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brandarticles', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('typeid');
            $table->integer('ismake');
            $table->integer('click');
            $table->string('title');
            $table->string('shorttitle')->nullable();
            $table->string('flags')->nullable();
            $table->string('tags')->nullable();
            $table->string('country')->nullable();
            $table->integer('mid');//文档类型
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('write');
            $table->string('litpic')->nullable();
            $table->smallInteger('dutyadmin');
            $table->text('body')->nullable();
            $table->string('redirect')->nullable();//跳转链接
            $table->string('bdxg_search')->nullable();
            $table->string('brandname')->nullable();//品牌名称
            $table->string('brandtime')->nullable();//成立时间
            $table->string('brandorigin')->nullable();//品牌发源地
            $table->string('brandnum')->nullable();//门店总数
            $table->string('brandpay')->nullable();//加盟费用
            $table->string('brandarea')->nullable();//加盟区域
            $table->string('brandmap')->nullable();//经营范围
            $table->string('brandperson')->nullable();//加盟人群
            $table->string('brandattch')->nullable();//加盟意向人数
            $table->string('brandapply')->nullable();//申请加盟人数
            $table->string('brandchat')->nullable();//项目咨询人数
            $table->string('brandgroup')->nullable();//公司名称
            $table->string('brandaddr')->nullable();//公司地址
            $table->string('brandduty')->nullable();//区域授权
            $table->mediumText('imagepics')->nullable();//品牌图集
            $table->string('acreage')->nullable();//所需面积
            $table->string('genre')->nullable();//公司性质
            $table->string('licenseno')->nullable();//特许加盟许可证号
            $table->string('registeredcapital')->nullable();//注册资金
            $table->integer('decorationpay')->default(0);//装修费用
            $table->integer('quartersrent')->default(0);//前两季度房租
            $table->integer('equipmentcost')->default(0);//铺货设备费用
            $table->integer('workingcapital')->default(0);
            $table->integer('laborquarter')->default(0);
            $table->integer('miscellaneous')->default(0);
            $table->integer('dailyvolume')->default(0);
            $table->integer('unitprice')->default(0);
            $table->integer('watercoal')->default(0);
            $table->string('ppjstitle')->nullable();//品牌介绍标题
            $table->string('ppindextitle')->nullable();//品牌介绍标题
            $table->string('jmxqtitle')->nullable();//加盟详情标题
            $table->string('lrfxtitle')->nullable();//加盟优势标题
            $table->string('gsjstitle')->nullable();//加盟流程标题
            $table->mediumText('ppjs_content')->nullable();//品牌介绍内容
            $table->mediumText('jmxq_content')->nullable();//加盟详情内容
            $table->mediumText('lrfx_content')->nullable();//加盟流程内容
            $table->mediumText('gsjs_content')->nullable();//开店要求内容
            $table->index('brandname');
            $table->index('brandnum');
            $table->index('brandpay');
            $table->index('brandattch');
            $table->index('brandapply');
            $table->index('brandchat');
            $table->timestamp('published_at')->nullable();//预选发布时间
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
        Schema::dropIfExists('brandarticles');
    }
}
