<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Laravel\Passport\Passport;
use View;
use App\Models\Menu;
use App\Models\MenuItem;
use Cache;
use Session;

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
        Paginator::useBootstrap();
        Passport::routes();
        View::composer(['homepage.*', 'cart.*', 'product.*'], function ($view) {
            $cart = [];
            $cart['cart'] = Session::get('cart');
            $total = $quantity = 0;
            if (isset($cart['cart']) && is_array($cart['cart']) && count($cart['cart']) > 0) {
                foreach ($cart['cart'] as $k => $item) {
                    $total += $item['quantity'] * $item['price'];
                    $quantity += $item['quantity'];
                }
            }
            $cart['total'] = $total;
            $cart['quantity'] = $quantity;
            $view->with('cart', $cart);
        });
        $settingEmail = \App\Models\ConfigInfo::select('data')->where('id', 1)->first();
        if ($settingEmail) {
            $emailJson = json_decode($settingEmail->data, true);
            config(['mail.mailers.smtp.username' => !empty($emailJson) ? (!empty($emailJson[0]) ? $emailJson[0] : env('MAIL_USERNAME')) : env('MAIL_USERNAME'), 'mail.mailers.smtp.password' => !empty($emailJson) ? (!empty($emailJson[1]) ? $emailJson[1] : env('MAIL_USERNAME')) : env('MAIL_PASSWORD')]);
        }
        // cấu hình thời gian sống cho refresh tokens và access tokens
        // Passport::tokensExpireIn(Carbon::now()->addDays(15));
        // Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
        // loại bỏ các tokens
        //Passport::pruneRevokedTokens();
    }
}
