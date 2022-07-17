<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class GovernmentSeeder extends Seeder
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
          'name' => 'Dania',
          'email' => 'dinia@mail.com',
          'password' => 'password',
          'employee_degree' => 'S1 Teknik Informatika',
          'employee_type' => 'Dinas Pendidikan',
        ],
        [
          'name' => 'Dimas',
          'email' => 'diman@mail.com',
          'password' => 'password',
          'employee_degree' => 'S1 Teknik Informatika',
          'employee_type' => 'Dinas kehutanan',
        ],
      ];


      foreach($users as $user) {
        $u = User::create($user);
        $u->assignRole(User::Government);
      }
    }
}
