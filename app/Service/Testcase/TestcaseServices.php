<?php

namespace App\Service\Testcase;

use TestcaseRepository;

class TestcaseServices
{
    protected $repo;

    public function __construct(TestcaseRepository $testcaseRepo)
    {
        $this->repo = $testcaseRepo;
    }

    public function find($id)
    {
        return $this->repo->find($id);
    }

    public function findFirst($id)
    {
        return $this->repo->findFirst($id);
    }

    public function create($id, $request)
    {
        $this->repo->create($request, $id);
    }

    public function delete($id)
    {
        $this->repo->delete($id);
    }

    public function getTestcase($id)
    {
        return $this->repo->getTestcase($id);
    }
}