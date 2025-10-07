<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MemberServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // View::composer('Dashboard.master', function ($view) {
        //     $members = Member::all();
        //     $view->with('members', $members);
        // });
    }
}
