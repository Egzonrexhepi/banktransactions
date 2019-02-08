<?php

namespace App\Providers;

use App\BankTransaction;
use App\BankTransactionPart;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Eloquent\EloquentBankTransactionPartRepository;
use App\Repositories\Eloquent\EloquentBankTransactionRepository;
use App\Repositories\Eloquent\EloquentUserRepository;
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
        $this->app->bind(BankTransaction::class, EloquentBankTransactionRepository::class);
        $this->app->bind(BankTransactionPart::class, EloquentBankTransactionPartRepository::class);
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
