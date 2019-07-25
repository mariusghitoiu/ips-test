<?php

use App\UserProgress;
use Illuminate\Database\Seeder;

class UserProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!UserProgress::query()->count(['*'])) {
            factory(UserProgress::class, 30)->create();
        }
    }
}
