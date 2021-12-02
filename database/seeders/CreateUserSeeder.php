<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'=>'Admin',
                'email'=>'admin@blkprovgtlo.com',
                'roles'=>'1',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Penulis',
                'email'=>'penulis@blkprovgtlo.com',
                'roles'=>'0',
                'password'=> bcrypt('123456'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
