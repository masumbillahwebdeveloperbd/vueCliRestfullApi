<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

          'name'=>'Masum',
          'email'=>'fabrika786@gmail.com',
          'password'=>bcrypt('masum1981')
          
        ]);
    }
}
