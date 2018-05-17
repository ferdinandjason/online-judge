<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Contest;

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
}

