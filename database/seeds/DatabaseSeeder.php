<?php

use App\ModuleReminderTag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(iPSDevTestSeeder::class);
         $this->call(UsersSeeder::class);
         $this->call(UserProgressSeeder::class);
         $this->call(ModuleReminderTagsSeeder::class);
    }
}
