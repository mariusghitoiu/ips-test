<?php

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
        factory(App\UserProgress::class, 20)->create();
    }
}
