<?php

namespace App\Providers;

use App\Models\Script;
use App\Observers\ScriptObserver;
use App\Observers\SettingObserver;
use App\Setting;
use Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Telegram::class, function ($app) {
            return new Telegram(new Http(), config('bot.bot'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        //Observers
        Script::observe(ScriptObserver::class);
        Setting::observe(SettingObserver::class);

        Gate::define('admin-only', function ($user) {
            if ($user->isAdmin() || $user->isModerator()) {
                return true;
            }

            return false;
        });
    }
}
