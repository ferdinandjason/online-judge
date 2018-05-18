<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Contest;
use Scoreboard;
use ContestProblem;

class APIController extends Controller
{
    //
    public function problems($id){
        $problem = \Problem::getProblem($id);
        $data = [
            $problem->total_ce,
            $problem->total_ac,
            $problem->total_wa,
            $problem->total_rte,
            $problem->total_tle,
            $problem->total_mle,
            $problem->total_fsc,
            $problem->total_tl
        ];
        $labels = [
            'CE',
            'AC',
            'WA',
            'RTE',
            'TLE',
            'MLE',
            'FSC',
            'TL'
        ];
        $color = [
            '#FFCD56',
            '#36A2EB',
            '#FF6384',
            '#4BC0C0',
            '#FF9F40',
            '#9966FF',
            '#C9CBCF',
            '#000000'
        ];

        return Response::json([
                'datasets'=>[['data'=>$data,'backgroundColor'=>$color]],
                'labels'=>$labels,
                ]);
    }

    public function contestPercentage($id){
        $contest = Contest::getContest($id);
        return getCurrentPercentageTime($contest->start_time,$contest->end_time);
    }

    public function contestElapsed($id){
        $contest = Contest::getContest($id);
        return getElapsedTime($contest->start_time,$contest->end_time);
    }

    public function contestRemaining($id){
        $contest = Contest::getContest($id);
        return getRemainingTime($contest->start_time,$contest->end_time);
    }

    public function getLineCharts($contestId)
    {
        $scoreboard = Scoreboard::getScoreboard($contestId);
        $contestProblem = ContestProblem::getContestProblem($contestId);
        $userTopAcc = array();
        $data = array();
        for($i=0;$i<min(10,count($scoreboard));$i++)
        {
            $userTopAcc[] = $scoreboard[$i]['name'];
            $data[$scoreboard[$i]['name']] = $scoreboard[$i]['score'];
        }
        $datasets = array();
        foreach ($userTopAcc as $c){
            $ds = array();
            $temp = $data[$c];
            $data = array();
            foreach ($contestProblem as $p){
                if($temp[$p->problem_id]['is_accepted']) {
                    $x = \Carbon\Carbon::parse($temp[$p->problem_id]['accepted_in'])->diffInMinutes(Contest::getContest($contestId)->start_time);
                    $y = 1;
                    array_push($data,Array('x'=>$x,'y'=>$y));
                }
            }
            usort($data,'line_cmp');
            if(count($data)>1) {
                for($i=1;$i<count($data);$i++){
                    $data[$i]['y'] += $data[$i-1]['y'];
                }
            }
            $ds[] = Array('label'=>$c,'data'=>$data);
            $datasets[] = $ds;
        }
        return Response::json($datasets);
    }

    public function stop($contestId){
        Contest::stop($contestId);
    }

}

