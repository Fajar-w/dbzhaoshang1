<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'ip' => $faker->ipv4,
        'mobilephone'=>$faker->unique()->phoneNumber,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\AdminModel\Admin::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
//栏目测试数据
$factory->define(App\AdminModel\Arctype::class, function (Faker\Generator $faker) {

    return [
        'typename' => $faker->company,
        'reid'=>rand(0,5),
        'topid'=>rand(0,1),
        'sortrank'=>rand(1,10),
        'typename'=>$faker->company,
        'typedir'=>$faker->word,
        'title'=>$faker->title,
        'keywords'=>$faker->word,
        'description'=>$faker->sentence($nbWords = 6, $variableNbWords = true) ,
        'is_write'=>rand(0,1),
        'real_path'=>$faker->word,
        'litpic'=>$faker->imageUrl(640,480),
        'typeimages'=>$faker->imageUrl(640,480),
        'contents'=>$faker->text,
        //'email' => $faker->unique()->safeEmail,
        //'password' => $password ?: $password = bcrypt('secret'),
        //'remember_token' => str_random(10),
    ];
});

//文档测试数据
$factory->define(App\AdminModel\Archive::class, function (Faker\Generator $faker) {

    return [
        'typeid' => rand(1,50),
        'ismake'=>rand(0,1),
        'click'=>rand(1000,5000),
        'title'=>$faker->text(50),
        'shorttitle'=>$faker->title,
        'tags'=>$faker->word,
        'country'=>$faker->city,
        'published_at'=>Carbon\Carbon::now(),
        'mid'=>rand(0,1),
        'keywords'=>$faker->word,
        'description'=>$faker->sentence($nbWords = 6, $variableNbWords = true) ,
        'write'=>$faker->name,
        'litpic'=>$faker->imageUrl(640,480),
        'dutyadmin'=>rand(1,5),
        'flags'=>$faker->randomElement($array = array ('h','p','c','f','s','a')),
    ];
});

//文档测试数据
$factory->define(App\AdminModel\Addonarticle::class, function (Faker\Generator $faker) {

    return [
        'typeid' => rand(0,50),
        'body'=>$faker->text,
        'pics'=>$faker->imageUrl(640,480),
        'brandname'=>$faker->company,
        'brandtime'=>$faker->dateTime,
        'brandorigin'=>$faker->address,
        'brandnum'=>rand(500,10000),
        'brandpay'=>rand(500,10000),
        'brandarea'=>$faker->city,
        'brandmap'=>$faker->citySuffix,
        'brandperson'=>rand(100,500),
        'brandattch'=>rand(100,500),
        'brandapply'=>rand(100,500),
        'brandchat'=>rand(100,500),
        'brandgroup'=>$faker->company,
        'brandaddr'=>$faker->address,
        'brandduty'=>$faker->jobTitle,
        'imagepics'=>$faker->imageUrl(640,480),
        'jmxq_content'=>$faker->text(1000),
        'jmys_content'=>$faker->text(1000),
        'jmlc_content'=>$faker->text(1000),
        'jmzc_content'=>$faker->text(1000),
        'jmask_content'=>$faker->text(1000),
    ];
});

//友情链接
$factory->define(App\AdminModel\flink::class, function (Faker\Generator $faker) {

    return [
        'weburl' =>$faker->domainName,
        'webname' => $faker->text(50),
        'note' =>$faker->name,
        'address' => $faker->address,

    ];
});

//电话
$factory->define(App\AdminModel\Phonemanage::class, function (Faker\Generator $faker) {

    return [
        'name' =>$faker->name,
        'phoneno' => $faker->phoneNumber,
        'note' =>$faker->text(50),
        'address' => $faker->address,
        'ip' => $faker->ipv4,
        'gender' => '男',
    ];
});