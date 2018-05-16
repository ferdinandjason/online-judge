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
    return \ContestMember::countPeopleJoin($id)->member;
}