<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;
use App\User;
use Submission;
use Contest;
use Problem;
use Testcase;
use Scoreboard;
use UserSolvedProblem;
use Illuminate\Console\Command;

class RunGrader extends Command
{
    protected $home = '/home/ferdinand/Code/OnlineJudge';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:grader';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the grader machine';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        echo("Grader started.\n");
        echo("Waiting for new submissions...\n");
        while(TRUE){
            sleep(1);

            if(!Submission::hasNewSubmission()) continue;

            $submission = Submission::getNewSubmission();
            $this->gradeSubmission($submission);

            echo("Waiting for new submissions...\n");
        }
    }

    private function getContest($id)
    {
        return Contest::getContest($id);
    }

    private function gradeSubmission($submission)
    {
        $problem = Problem::getProblem($submission->problem_id);
        $msg  = "Found new submision!\n";
        $msg .= '                   Submission  : '.$submission->id." \n";
        $msg .= '                   User        : '.$submission->user_id." \n";
        $msg .= '                   Problem     : '.$submission->problem_id." \n";
        $msg .= '                   Language    : '.$submission->lang." \n";
        if($submission->contest_id !=0){
            $msg .= '                   Contest    : '.$submission->contest_id." \n";
        }
        echo $msg;

        $compileStatus = $this->compileSubmission($submission);
        if ($compileStatus == 0){
            $verdict = $this->runSubmission($submission,$problem);
        }
        else{
            $verdict = 1;
        }

        $this->setSubmissionVerdict($submission,$verdict);
    }

    private function compileSubmission($submission)
    {
        $code = DB::table('codes')->where('id',$submission->id)->first()->code;
        $problem_path = $this->home.'/storage/app/public/testcase/'.$submission->problem_id;
        $codes = fopen($problem_path.'/source.cpp','w');
        fwrite($codes,$code);

        $compile_cmd = 'g++ -std=c++11 '.$problem_path.'/source.cpp -o '.$problem_path.'/source -O2 -s -static -lm'.' 2>&1';
        exec($compile_cmd,$output,$retval);

        $compileResult = '';
        foreach($output as $o){
            $compileResult .= $o.'<br>';
        }
        $compileResult = str_replace($this->home.'/storage/app/public/testcase','',$compileResult);
        Submission::updateCompileResult($submission->id,$compileResult);
        echo('Compile status : '.$retval."\n");
        return $retval;
    }

    private function setSubmissionVerdict($submission,$verdict)
    {
        echo $verdict;
        Submission::updateVerdictResult($submission->id,$verdict);
        echo('Final verdict : '.get_verdict($verdict)."\n");
    }

    private function runSubmission($submission,$problem)
    {
        if ($submission->contest_id != 0 && $submission->created_at > $this->getContest($submission->contest_id)->end_time) {
            $verdict = 8;
            return $verdict;
        }

        $problemPath = $this->home . '/storage/app/public/testcase/' . $submission->problem_id;
        $testcase = Testcase::getTestcase($submission->problem_id);
        $overallVerdict = 2; // Accepted;

        $graderPath = $this->home . '/storage/app/public/moe/obj/box';
        $submissionPath = $problemPath;

        $runTime = 0.0;
        $runMemo = 0.0;
        $count = count($testcase);

        $verdictResult = '';
        foreach ($testcase as $t) {
            $tcPath = $this->home.'/storage/app/public';
            $outPath = $submissionPath . '/judging/' . $t->id;

            if (!is_dir($submissionPath)) {
                mkdir($submissionPath);
                chmod($submissionPath, 0777);
            }

            if (!is_dir($submissionPath . '/judging')) {
                mkdir($submissionPath . '/judging');
                chmod($submissionPath . '/judging', 0777);
            }

            if (!is_dir($outPath)) {
                mkdir($outPath);
                chmod($outPath, 0777);
            }

            $run_cmd = $graderPath . '/box';

            $run_cmd .= ' -f -a3';
            $run_cmd .= ' -m' . (1024 * $problem->memory_limit);
            $run_cmd .= ' -w' . $problem->time_limit;
            $run_cmd .= ' -i' . $tcPath . '/' . $t->path_input;
            $run_cmd .= ' -o' . $outPath . '/out';
            $run_cmd .= ' -r' . $outPath . '/error';
            $run_cmd .= ' -M' . $outPath . '/result';
            $run_cmd .= ' -- ' . $problemPath . '/source' . ' 2> /dev/null';

            exec($run_cmd, $output, $retval);
            // reads the execution results
            $run_result = array();
            foreach (explode("\n", file_get_contents($outPath . '/result')) as $w) {
                $line = explode(':', $w);
                $run_result[$line[0]] = @$line[1];
            }

            $verdict = 2; // Accepted
            if (@$run_result['status'] == 'SG' && @$run_result['exitsig'] == 11)
                $verdict = 4; // Runtime Error
            else if (@$run_result['status'] == 'TO')
                $verdict = 5; // Time Limit Exceeded
            else if (@$run_result['status'] == 'SG' && @$run_result['exitsig'] == 9)
                $verdict = 6; // Memory Limit Exceeded
            else if (@$run_result['status'] == 'FO')
                $verdict = 7; // Forbidden System Call
            else if (isset($run_result['status']))
                $verdict = 4; // Unknown Error; treated as Runtime Error
            else {
                $diff_cmd = 'diff -q ' . $tcPath . '/' . $t->path_output . ' ' . $outPath . '/out' . ' > ' . $outPath . '/diff';
                exec($diff_cmd, $output, $retval);
                $diff = file_get_contents($outPath . '/diff');
                if (!empty($diff))
                    $verdict = 3; // Wrong Answer
                unlink($outPath . '/diff');
            }

            $run_result_time = ((float)$run_result['time-wall']) * 100;
            $run_result_memory = (float)$run_result['mem'] / (1024);
            $verdictResult .= $this->getVerdict($verdict) . ',';
            $runTime += $run_result_time;
            $runMemo += $run_result_memory;

            if ($overallVerdict < $verdict)
                $overallVerdict = $verdict;
            unlink($outPath . '/out');
            unlink($outPath . '/error');
            unlink($outPath . '/result');
            rmdir($outPath);
        }
        if($count == 0){
            $overallVerdict = 2;
            Submission::updateVerdictResult($submission->id,$overallVerdict);
            Submission::updateTimeResult($submission->id,0.0);
            Submission::updateMemoryResult($submission->id,0,0);
        }
        else{
            Submission::updateVerdictResult($submission->id,$overallVerdict);
            Submission::updateTimeResult($submission->id,(float)$runTime/$count);
            Submission::updateMemoryResult($submission->id,$runMemo/$count);
        }

        if($submission->contest_id == 0)
        {
            User::where('id',$submission->user_id)->increment('total_submission');
            if($overallVerdict == 2){
                User::where('id',$submission->user_id)->increment('total_ac');
            }
            Problem::increment($submission->problem_id,'total_submit');
            UserSolvedProblem::create($submission->user_id,$submission->problem_id);
            if($overallVerdict == 1) Problem::increment($submission->problem_id,'total_ce');
            if($overallVerdict == 2) Problem::increment($submission->problem_id,'total_ac');
            if($overallVerdict == 3) Problem::increment($submission->problem_id,'total_wa');
            if($overallVerdict == 4) Problem::increment($submission->problem_id,'total_rte');
            if($overallVerdict == 5) Problem::increment($submission->problem_id,'total_tle');
            if($overallVerdict == 6) Problem::increment($submission->problem_id,'total_mle');
            if($overallVerdict == 7) Problem::increment($submission->problem_id,'total_fsc');
            if($overallVerdict == 8) Problem::increment($submission->problem_id,'total_tl');
        }
        else
        {
            if($submission->verdict == -1){
                Scoreboard::regrade($submission,$overallVerdict);
            }
            else{
                Scoreboard::addToScoreboard($submission->contest_id,$submission->problem_id,$submission->user_id,$overallVerdict,$submission);
            }
        }
        return $overallVerdict;
    }

    private function getVerdict($verdict){
        if ($verdict == 0 ) return "Judging";
        else if($verdict == 1) return "COMPILE ERROR";
        else if($verdict == 2) return "ACCEPTED";
        else if($verdict == 3) return "WRONG ANSWER";
        else if($verdict == 4) return "RUN TIME ERROR";
        else if($verdict == 5) return "TIME LIMIT EXCEDEED";
        else if($verdict == 6) return "MEMORY LIMIT EXCEDEED";
        else if($verdict == 7) return "FORBIDDEN SYSTEM CALL";
        else if($verdict == 8) return "TOO LATE";
    }
}
