<?php

namespace App\Providers;
use App\Models\LoaiXeModel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap(10);
        view()->composer('*',function($view){
            $view->with([
                'category'=> $category=LoaiXeModel::where('trangthai',1)->get(),   

            ]);
        });
        
    }
}
