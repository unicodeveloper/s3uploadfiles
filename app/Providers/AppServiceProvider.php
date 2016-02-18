<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Validator::extend('audio_type', function ($attribute, $value, $parameters, $validator) {
        //     $bytes = filesize($value);
        //     $fileSize = $this->formatSizeUnits($bytes);
        //     if ($fileSize >= 1.00 && $fileSize <= 6.00) {
        //         return $fileSize;
        //     }
        // });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
