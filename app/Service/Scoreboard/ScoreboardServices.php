<?php

namespace App\Service\Scoreboard;

use Carbon\Carbon;
use Contest;
use ContestMember;
use ContestProblem;
use Illuminate\Support\Facades\Auth;
use ScoreboardRepository;

class ScoreboardServices
{
    protected $repo;

    public function __construct(ScoreboardRepository $scoreboardRepository)
    {
        $this->repo = $scoreboardRepository;
    }

    public function addToScoreboard($contestId, $problemId, $userId, $verdict, $submission)
    {
        $scoreboard = $this->repo->find($contestId, $problemId, $userId);
        if ($scoreboard->first() == null) {
            if ($verdict != 2) {
                $this->repo->create([
                    'contest_id' => $contestId,
                    'user_id' => $userId,
                    'problem_id' => $problemId,
                    'submission_count' => 1,
                    'penalty' => 1,
                    'is_accepted' => 0
                ]);
            } else {
                $this->repo->create([
                    'contest_id' => $contestId,
                    'user_id' => $userId,
                    'problem_id' => $problemId,
                    'submission_count' => 1,
                    'penalty' => 0,
                    'is_accepted' => 1
                ]);
            }
        } else {
            $time = Carbon::parse($submission->created_at)->diffInMinutes(Contest::getContest($contestId)->created_at);
            if ($scoreboard->first()->is_accepted == 0) {
                if ($verdict != 2) {
                    $scoreboard->increment('penalty', $time);
                    $scoreboard->increment('submission_count');
                } else {
                    $scoreboard->increment('submission_count');
                    $scoreboard->increment('is_accepted');
                }
            }
        }
    }

    public function getScoreboard($contestId)
    {
        $users = ContestMember::getContestMember($contestId);
        $board = array();

        $problems = ContestProblem::getContestProblem($contestId);

        foreach ($users as $u) {
            $board[$u->user_id]['name'] = $u->user->username;
            $board[$u->user_id]['total_accepted'] = 0;
            $board[$u->user_id]['total_penalty'] = 0;
            $board[$u->user_id]['score'] = array();

            foreach ($problems as $p) {
                $board[$u->user_id]['score'][$p->problem_id]['submission_count'] = 0;
                $board[$u->user_id]['score'][$p->problem_id]['time_penalty'] = 0;
                $board[$u->user_id]['score'][$p->problem_id]['is_accepted'] = 0;
                $board[$u->user_id]['score'][$p->problem_id]['accepted_in'] = '0';
            }
        }

        $scoreboard = $this->repo->getContest($contestId);

        foreach ($scoreboard as $s) {
            if (isset($board[$s->user_id]['score'][$s->problem_id]) && (Auth::user()->isAdmin || Carbon::parse($s->updated_at)->lte(Contest::getContest($contestId)->freeze_time))) {
                $board[$s->user_id]['score'][$s->problem_id]['submission_count'] = $s->submission_count;
                $board[$s->user_id]['score'][$s->problem_id]['time_penalty'] = $s->penalty;
                $board[$s->user_id]['score'][$s->problem_id]['is_accepted'] = $s->is_accepted;
                $board[$s->user_id]['score'][$s->problem_id]['accepted_in'] = Carbon::parse($s->updated_at)->diffInMinutes(Contest::getContest($contestId)->start_time);

                if ($board[$s->user_id]['score'][$s->problem_id]['is_accepted']) {
                    $board[$s->user_id]['total_accepted'] += 1;
                    $board[$s->user_id]['total_penalty'] += $s->time_penalty + 20 * ($s->submission_count - 1);
                }
            }
        }

        usort($board, 'score_cmp');
        return $board;
    }

    public function regrade($submission, $verdict)
    {
        $submissions = Submission::getSubmissionContestWithProblem($submission->contest_id, $submission->problem_id);
        $this->repo->find($submission->contest_id, $submission->problem_id, $submission->user_id)->delete();
        foreach ($submissions as $s) {
            if ($s != $submission) {
                $this->addToScoreboard($s->contest_id, $s->problem_id, $s->user_id, $s->verdict, $s);
            } else {
                $this->addToScoreboard($s->contest_id, $s->problem_id, $s->user_id, $verdict, $s);
            }
        }
    }
}