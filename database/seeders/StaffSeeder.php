<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = [
        [
          'name' => 'Agus wewra',
          'email' => 'agus@mail.com',
          'password' => 'password',
          'employee_degree' => 'S1 Teknik Informatika',
          'employee_type' => 'Pengelolah Jaringan',
        ],
        [
          'name' => 'Azman',
          'email' => 'azman@mail.com',
          'password' => 'password',
          'employee_degree' => 'S1 Teknik Informatika',
          'employee_type' => 'Programmer',
        ],
      ];


      foreach($users as $user) {
        $u = User::create($user);
        $u->assignRole(User::Staff);
      }
    }
}
