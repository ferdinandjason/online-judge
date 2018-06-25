<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = factory(User::class)->make([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'isAdmin' => 1,
        ]);
        $admin->save();
    }
}
