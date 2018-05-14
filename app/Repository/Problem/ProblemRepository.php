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
    public function create(Request $request);
    public function update($id,Request $request);
    public function delete($id);
}