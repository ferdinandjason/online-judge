<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/14/18
 * Time: 11:36 AM
 */

interface ProblemTagRepository
{
    public function find($id);
    public function findFirst($id);
    public function all();
    public function allPaginate($n);
    public function create($data,$request);
    public function update($id,$request);
    public function delete($id);
}