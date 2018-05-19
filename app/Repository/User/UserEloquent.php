<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/19/18
 * Time: 5:55 PM
 */

namespace App\Repository\User;


use App\User;

class UserEloquent implements \UserRepository
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    // yang tadi kamu definisikan dijelaskan disini yo
}