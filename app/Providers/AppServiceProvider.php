<?php

namespace App\Providers;

use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\DB;
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
        'App\repositories\AvatarRepository';
        'App\repositories\GameRepository';
        'App\repositories\GuildrRepository';
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        //display query executed in terminal
        if ($this->app->environment() === 'local') {
            DB::listen(function (QueryExecuted $query) {
                file_put_contents('php://stdout', "\e[34m{$query->sql}\t\e[37m" . json_encode($query->bindings) . "\t\e[32m($query->time)ms\e[On\n");
            });
        }
    }
}
