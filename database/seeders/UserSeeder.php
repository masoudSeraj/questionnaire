<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->state(['name' => 'masoud seraj', 'email' => 'masoud.seraj.1991@gmail.com'])->create();
        $role = Role::create(['name' => config('questionnaire.super-admin')]);

        $user->assignRole($role);
    }
}
