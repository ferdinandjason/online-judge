<?php

namespace App\Repository\ProblemTag;

use Problem;
use App\ProblemTag;
use Illuminate\Support\Facades\DB;
use ProblemTagRepository;

class ProblemTagEloquent implements ProblemTagRepository
{
    protected $model;

    public function __construct(ProblemTag $problemTag)
    {
        $this->model = $problemTag;
    }

    public function find($id)
    {
        return $this->model->where('name', $id)->get();
    }

    public function findFirst($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function all()
    {
        return $this->model->select('name', DB::raw('count(*) as total'))
            ->groupBy('name')->orderBy('name')->get();
    }

    public function allPaginate($n)
    {
        return $this->model->select('name', DB::raw('count(*) as total'))
            ->groupBy('name')->orderBy('name')->paginate($n);
    }

    public function create($data, $problemId)
    {
        foreach ($data as $tag) {
            $this->model->create(Array('name' => $tag, 'problem_id' => $problemId));
        }
    }

    public function update($id, $request)
    {
        $temporary = $this->find($id);
        $data_tags_old = Array();
        foreach ($temporary as $t) {
            array_push($data_tags_old, $t->Tags);
        }
        $data_tags = explode(',', $request['Tags']);
        if (count($data_tags) >= count($data_tags_old)) {
            $temp = array_diff($data_tags, $data_tags_old);
            $this->create($temp, $request);
        } else {
            $this->delete($id);
            $this->create($data_tags, $request);
        }
    }

    public function delete($id)
    {
        $this->model->where('Id', $id)->delete();
    }


}