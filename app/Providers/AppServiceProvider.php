<?php

namespace App\Providers;

use App\Events\OrderCreated;
use App\Listeners\EmptyCart;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use App\Listeners\DeductProductQuantity;
use App\Listeners\SendOrderCreatedNotification;
use App\Notifications\OrderCreatedNotification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            return $user->hasRole('super admin') ? true : null;
        });

        Event::listen(
            OrderCreated::class,
            DeductProductQuantity::class
        );



        Event::listen(
            OrderCreated::class,
            SendOrderCreatedNotification::class
        );

        // Event::listen(
        //     OrderCreated::class,
        //     EmptyCart::class
        // );
    }
}
