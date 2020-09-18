<?php

namespace App\Providers;

use App\Services\booking\AvailableBookingService;
use App\Services\booking\AvailableBookingServiceImp;
use App\Services\booking\CreateBookingService;
use App\Services\booking\CreateBookingServiceImpl;
use App\Services\booking\DeleteBookingService;
use App\Services\booking\DeleteBookingServiceImpl;
use App\Services\table\CheckAvailableTableService;
use App\Services\table\CheckAvailableTableServiceImpl;
use App\Services\table\CreateTableService;
use App\Services\table\CreateTableServiceImpl;
use App\Services\table\DeleteTableService;
use App\Services\table\DeleteTableServiceImpl;
use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{

    public $bindings = [
        CreateTableService::class => CreateTableServiceImpl::class,
        DeleteTableService::class => DeleteTableServiceImpl::class,
        AvailableBookingService::class => AvailableBookingServiceImp::class,
        CheckAvailableTableService::class => CheckAvailableTableServiceImpl::class,
        CreateBookingService::class => CreateBookingServiceImpl::class,
        DeleteBookingService::class => DeleteBookingServiceImpl::class,
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
