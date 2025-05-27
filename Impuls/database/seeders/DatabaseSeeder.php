<?php

namespace Database\Seeders;

use App\Models\Complaint;
use App\Models\Department;
use App\Models\ProblemTypes;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = Role::factory(4)->create();
        Status::factory(4)->create();
        ProblemTypes::factory(4)->create();
        Department::factory(10)->create();
        User::factory(10)->create()->each(function ($user) use ($roles) {
            $user->roles()->attach(
                $roles->random(1)->pluck('id')->toArray()
            );
        });
        Complaint::factory(100)->create();
    }
}
