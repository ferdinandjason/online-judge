<?php

namespace App\Providers;

use App\Clarification;
use App\Comment;
use App\Contest;
use App\ContestMember;
use App\ContestProblem;
use App\Repository\Clarification\ClarificationEloquent;
use App\Repository\Comment\CommentEloquent;
use App\Repository\Contest\ContestEloquent;
use App\Repository\ContestMember\ContestMemberEloquent;
use App\Repository\ContestProblem\ContestProblemEloquent;
use App\Repository\Scoreboard\ScoreboardEloquent;
use App\Repository\Submission\SubmissionEloquent;
use App\Repository\Testcase\TestcaseEloquent;
use App\Repository\User\UserEloquent;
use App\Scoreboard;
use App\Submission;
use App\Testcase;
use App\User;
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

        $this->app->bind('App\Repository\Testcase\TestcaseRepository',function($app){
            return new TestcaseEloquent(new Testcase());
        });

        $this->app->bind('App\Repository\Submission\SubmissionRepository',function($app){
            return new SubmissionEloquent(new Submission());
        });

        $this->app->bind('App\Repository\Contest\ContestRepository',function($app){
            return new ContestEloquent(new Contest());
        });

        $this->app->bind('App\Repository\ContestProblem\ContestProblemRepository',function($app){
            return new ContestProblemEloquent(new ContestProblem());
        });

        $this->app->bind('App\Repository\ContestMember\ContestMemberRepository',function($app){
            return new ContestMemberEloquent(new ContestMember());
        });

        $this->app->bind('App\Repository\Scoreboard\ScoreboardRepository',function($app){
           return new ScoreboardEloquent(new Scoreboard());
        });

        $this->app->bind('App\Repository\User\UserRepository',function($app){
            return new UserEloquent(new User());
        });

        $this->app->bind('App\Repository\Comment\CommentRepository',function($app){
            return new CommentEloquent(new Comment());
        });

        $this->app->bind('App\Repository\Clarification\ClarificationRepository',function($app){
            return new ClarificationEloquent(new Clarification());
        });
    }
}
