<?php

use App\Problem;
use Illuminate\Database\Seeder;

class ProblemsTableSeeder extends Seeder
{
    public function run()
    {
        $problem = factory(Problem::class)->make([
            'slug' => 'DUMMY',
            'title' => 'Dummy problem',
        ]);
        $problem->save();
    }
}
