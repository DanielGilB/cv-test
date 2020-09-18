<?php

namespace App\Providers;

use App\Repositories\booking\AvailableBookingRepository;
use App\Repositories\booking\AvailableBookingRepositoryImpl;
use App\Repositories\booking\CreateBookingRepository;
use App\Repositories\booking\CreateBookingRepositoryImpl;
use App\Repositories\booking\DeleteBookingRepository;
use App\Repositories\booking\DeleteBookingRepositoryImpl;
use App\Repositories\table\CheckAvailableTableRepository;
use App\Repositories\table\CheckAvailableTableRepositoryImpl;
use App\Repositories\table\CreateTableRepository;
use App\Repositories\table\CreateTableRepositoryImpl;
use App\Repositories\table\DeleteTableRepository;
use App\Repositories\table\DeleteTableRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{

    public $bindings = [
        CreateTableRepository::class => CreateTableRepositoryImpl::class,
        DeleteTableRepository::class => DeleteTableRepositoryImpl::class,
        AvailableBookingRepository::class => AvailableBookingRepositoryImpl::class,
        CheckAvailableTableRepository::class => CheckAvailableTableRepositoryImpl::class,
        CreateBookingRepository::class => CreateBookingRepositoryImpl::class,
        DeleteBookingRepository::class => DeleteBookingRepositoryImpl::class,
    ];

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
        //
    }
}
