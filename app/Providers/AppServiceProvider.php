<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        \View::share('categorys',\App\AdminModel\Arctype::all());
        Schema::defaultStringLength(191);
        $this->app->singleton(FakerGenerator::class,function(){
            return FakerFactory::create('zh_CN');
        });
        \Carbon\Carbon::setLocale('zh');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
