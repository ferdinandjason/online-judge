<?php

namespace App\Providers;

use App\Service\Clarification\ClarificationServices;
use App\Service\Comment\CommentServices;
use App\Service\Contest\ContestServices;
use App\Service\ContestMember\ContestMemberServices;
use App\Service\ContestProblem\ContestProblemServices;
use App\Service\Scoreboard\ScoreboardServices;
use App\Service\Submission\SubmissionServices;
use App\Service\UserSolvedProblem\UserSolvedProblemServices;
use Illuminate\Support\ServiceProvider;
use App\Service\Problem\ProblemServices;
use App\Service\ProblemTag\ProblemTagServices;
use App\Service\Testcase\TestcaseServices;
use App\Service\User\UserServices;

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

        $this->app->bind('ContestServices',function($app){
            return new ContestServices($app->make('App\Repository\Contest\ContestRepository'));
        });

        $this->app->bind('ContestProblemServices',function($app){
            return new ContestProblemServices($app->make('App\Repository\ContestProblem\ContestProblemRepository'));
        });

        $this->app->bind('ContestMemberServices',function($app){
            return new ContestMemberServices($app->make('App\Repository\ContestMember\ContestMemberRepository'));
        });

        $this->app->bind('ScoreboardServices',function($app){
           return new ScoreboardServices($app->make('App\Repository\Scoreboard\ScoreboardRepository'));
        });

        $this->app->bind('UserServices',function($app){
           return new UserServices($app->make('App\Repository\User\UserRepository'));
        });

        $this->app->bind('CommentServices',function($app){
           return new CommentServices($app->make('App\Repository\Comment\CommentRepository'));
        });

        $this->app->bind('ClarificationServices',function($app){
            return new ClarificationServices($app->make('App\Repository\Clarification\ClarificationRepository'));
        });

        $this->app->bind('UserSolvedProblemServices',function($app){
            return new UserSolvedProblemServices($app->make('App\Repository\UserSolvedProblem\UserSolvedProblemRepository'));
        });
    }
}