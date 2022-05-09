<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Resturent;
use App\Models\User;
use App\Models\ItemResturent;

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
    protected $policies = [
        // // 'App\Model' => 'App\Policies\ModelPolicy',
        //  Resturent::class => ResturentPolicy::class,
    ];
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerPolicies();
        Gate::define('view', function (User $user, Resturent $resturent) {
            return $user->id === $resturent->user_id;
        });
        Gate::define('add_item', function (Resturent $resturent, ItemResturent $item_res) {
            return $resturent->id === $item_res->resturent_id;
        });
        // Gate::define('index', function (User $user, Activity $act) {
        //     return $user->id === $act->user_id;
        // });
    }    
    }
