<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FormatTimeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
<<<<<<< HEAD
        require_once app_path().'/Helpers/FormatTime.php';
=======
        require_once app_path().'/helpers/FormatTime.php';
>>>>>>> 1c9afec8497d8e77efc6afd6e23c55d96663c1df
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
