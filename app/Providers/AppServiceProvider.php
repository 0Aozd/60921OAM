<?php

namespace App\Providers;

use App\Models\Transaction;
//use Illuminate\Auth\Access\Gate;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('pagination::default');

        Gate::define('edit-transaction', function (User $user, Transaction $transaction) {
            return $user->is_admin OR $transaction->category_id != 3;
        });

        Gate::define('destroy-transaction', function (User $user, Transaction $transaction) {
           return $user->is_admin OR $transaction->amount < 10000;
        });
    }
}
