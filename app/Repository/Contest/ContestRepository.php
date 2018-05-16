<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/16/18
 * Time: 9:17 PM
 */

use Illuminate\Http\Request;

interface ContestRepository{
    public function findFirst($id);
    public function all();
    public function create(Array $request);
    public function update($id,Array $request);
    public function delete($id);
}