<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/14/18
 * Time: 11:21 AM
 */

use Illuminate\Http\Request;

interface ProblemRepository{
    public function find($id);
    public function findFirst($id);
    public function all();
    public function allPaginate($n);
    public function create(Array $request);
    public function update($id,Array $request);
    public function delete($id);
    public function increment($id,$table);
}