<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/19/18
 * Time: 5:57 PM
 */

namespace App\Service\User;


class UserServices
{
    protected $repo;

    public function __construct(\UserRepository $userRepository)
    {
        $this->repo = $userRepository;
    }

    //definisikan fungsi fungsi yang akan dipanggil oleh controller
    // dengan memanggil fungsi fungsi dari UserRepository okaayy :)
    // nanti di controller use User; terus tinggal User::namafungsi()

    public function getAllUser()
    {
        return $this->repo->all();
    }

    public function getUser($id)
    {
        return $this->repo->find($id);
    }

}