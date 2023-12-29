<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Menu;
use App\Models\Notifications;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
    }
    public function boot()
    {
         // Lấy danh sách menu
        $menus = Menu::where('IsActive', 1)->get();
         // Chia sẻ biến 'headerData' với tất cả các view
        View::share('headerData', $menus);

        $nts = Notifications::where('status', 1)->get();
        View::share('Notifications_Data', $nts);
    }
}
