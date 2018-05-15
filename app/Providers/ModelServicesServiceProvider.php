<?php

namespace App\Providers;

use App\Service\Submission\SubmissionServices;
use Illuminate\Support\ServiceProvider;
use App\Service\Problem\ProblemServices;
use App\Service\ProblemTag\ProblemTagServices;
use App\Service\Testcase\TestcaseServices;

class ModelServicesServiceProvider extends ServiceProvider
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
        $this->app->bind('ProblemServices',function ($app){
            return new ProblemServices($app->make('App\Repository\Problem\ProblemRepository'));
        });

        $this->app->bind('ProblemTagServices',function ($app){
            return new ProblemTagServices($app->make('App\Repository\ProblemTag\ProblemTagRepository'));
        });

        $this->app->bind('TestcaseServices',function ($app){
            return new TestcaseServices($app->make('App\Repository\Testcase\TestcaseRepository'));
        });

        $this->app->bind('SubmissionServices',function ($app){
            return new SubmissionServices($app->make('App\Repository\Submission\SubmissionRepository'));
        });
    }
}