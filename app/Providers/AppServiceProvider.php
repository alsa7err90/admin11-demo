<?php

namespace App\Providers;

use App\Events\NewSeedDataCreated;
use App\Listeners\CreateNewSeedFile;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        Response::macro('successApi', function ($data,$message="success") {
            return Response::json([
              'status'  => true,
              'data' => $data,
              'message'=>$message,
            ]);
        });

        Response::macro('errorApi', function ($message, $status = 200) {
            return Response::json([
              'status'  => false,
              'message' => $message,
            ], $status);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(
            NewSeedDataCreated::class,
            CreateNewSeedFile::class,
        );
    }
}
