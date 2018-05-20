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
        $datas = array();
        for($i=0;$i<min(10,count($scoreboard));$i++)
        {
            $userTopAcc[] = $scoreboard[$i]['name'];
            $datas[$scoreboard[$i]['name']] = $scoreboard[$i]['score'];
        }
        $datasets = array();
        $ds = array();
        foreach ($userTopAcc as $c){
            $color = '#'.dechex(rand(0x000000, 0xFFFFFF));
            $temp = $datas[$c];
            $data = array();
            array_push($data,Array('x'=>0,'y'=>0));
            foreach ($contestProblem as $p){
                if($temp[$p->problem_id]['is_accepted']) {
                    $x = $temp[$p->problem_id]['accepted_in'];
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
            $ds[] = Array('label'=>$c,'data'=>$data,'borderColor'=>$color,'fill'=>false);
        }
        $datasets = $ds;
        return Response::json(['datasets'=>$datasets]);
    }

    public function stop($contestId){
        Contest::stop($contestId);
    }

}

