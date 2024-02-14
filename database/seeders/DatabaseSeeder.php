<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(300)->create();

        $users = \App\Models\User::all()->shuffle(); //randomize the elements

        //create some employers
        for($i = 0; $i < 20; $i++){
            \App\Models\Employer::factory()->create([
                'user_id' => $users->pop()->id //return an user nad remove it from the list of users
            ]);
        }

        $employers = \App\Models\Employer::all();

        //create some jobs
        for($i = 0; $i < 100; $i++){
            \App\Models\Job::factory()->create([
                'employer_id' => $employers->random()->id //random employer
            ]);
        }

        // \App\Models\User::factory(10)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
