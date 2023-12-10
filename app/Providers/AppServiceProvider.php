<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Menu;
use Illuminate\Support\Facades\View;
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
         // Lấy danh sách menu
         $menus = Menu::where('IsActive', 1)->get();
         // Chia sẻ biến 'headerData' với tất cả các view
         View::share('headerData', $menus);
    }
}
