<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Problem;
use App\ProblemTag;
use App\Repository\Problem\ProblemEloquent;
use App\Repository\ProblemTag\ProblemTagEloquent;

class ModelRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('App\Repository\Problem\ProblemRepository',function($app){
            return new ProblemEloquent(new Problem());
        });

        $this->app->bind('App\Repository\ProblemTag\ProblemTagRepository',function($app){
            return new ProblemTagEloquent(new ProblemTag());
        });
    }
}
