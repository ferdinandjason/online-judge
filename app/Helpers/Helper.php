<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/16/18
 * Time: 9:36 PM
 */

function CompareTimeLessThan($a,$b){
    return ($a >= $b);
}

function NotInsideCM($id,$contest_member){
    foreach ($contest_member as $cm) {
        if($cm->user_id == Auth::user()->id && $cm->contest_id == $id){
            return false;
        }
    }
    return true;
}

function getContestLength($start,$end){
    return \Carbon\Carbon::parse($end)->diffInHours(\Carbon\Carbon::parse($start));
}

function countPeopleJoin($id){
    try{
        return \ContestMember::countPeopleJoin($id)->member;
    }
    catch (Exception $e){
        return 0;
    }
}

function getCurrentPercentageTime($contestStartTime,$contestEndTime){
    $contestEndTime = \Carbon\Carbon::parse($contestEndTime);
    $nowTime = \Carbon\Carbon::now();
    $currentTime = $nowTime->min($contestEndTime);

    $elapsed = $currentTime->diffInSeconds($contestStartTime);
    $end = $contestEndTime->diffInSeconds($contestStartTime);

    return $elapsed/$end*100;
}

function getElapsedTime($contestStartTime,$contestEndTime){
    $contestEndTime = \Carbon\Carbon::parse($contestEndTime);
    $nowTime = \Carbon\Carbon::now();
    $currentTime = $nowTime->min($contestEndTime);

    $elapsed = $currentTime->diffInMinutes($contestStartTime);
    return $elapsed;
}

function getRemainingTime($contestStartTime,$contestEndTime){
    $contestEndTime = \Carbon\Carbon::parse($contestEndTime);
    $nowTime = \Carbon\Carbon::now();
    $currentTime = $nowTime->min($contestEndTime);

    $remainingTime = $currentTime->diffInMinutes($contestEndTime);
    return $remainingTime;
}

function get_verdict($verdict){
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

function score_cmp($a, $b){
    if ($a['total_accepted'] != $b['total_accepted'])
        return $b['total_accepted'] - $a['total_accepted'];
    if ($a['total_penalty'] != $b['total_penalty'])
        return $a['total_penalty'] - $b['total_penalty'];
    if ($a['name'] == $b['name'])
        return 0;
    return $a['name'] < $b['name'] ? -1 : 1;
}

function minimalPenalty($scoreboard,$problemId){
    $temp = array();
    foreach ($scoreboard as $c){
        $temp[] = $c['score'][$problemId]['accepted_in'];
    }
    return min($temp);
}

function getFirstAccProblem($scoreboard,$contestProblem){
    $firstPenalty = array();
    foreach ($contestProblem as $c){
        $firstPenalty[$c->problem_id] = minimalPenalty($scoreboard,$c->problem_id);
    }
    return $firstPenalty;
}

function isFirstAccepted($time,$array,$problemId){
    try{
        return $array[$problemId] == $time;
    }
    catch(Exception $e){
        return FALSE;
    }
}

function line_cmp($a,$b){
    return $a['x'] > $b['x'];
}