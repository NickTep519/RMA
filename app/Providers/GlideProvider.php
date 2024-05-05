<?php

namespace App\Providers;

use App\Service\ImagePathGenerator;
use Illuminate\Support\ServiceProvider;
use League\Glide\Signatures\Signature;

class GlideProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ImagePathGenerator::class, fn() => new ImagePathGenerator(env('GLIDE_KEY'))) ; 
        $this->app->singleton(Signature::class, fn() => new Signature(env('GLIDE_KEY'))) ; 
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
