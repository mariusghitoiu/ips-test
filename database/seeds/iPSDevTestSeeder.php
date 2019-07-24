<?php

use App\ModuleReminderTag;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Module;

class iPSDevTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Module::query()->count(['*'])) {
            for ($i = 1; $i <= 7; $i++) {
                $ipaName = 'IPA Module ' . $i;
                $ieaName = 'IEA Module ' . $i;
                $iaaName = 'IAA Module ' . $i;
                Module::insert([
                    [
                        'course_key' => 'ipa',
                        'name' => $ipaName,
                        'order' => $i,
                        'module_reminder_tag_id' =>
                            ModuleReminderTag::where('name', 'like', '%' .$ipaName. '%')->pluck('id')[0],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],

                    [
                        'course_key' => 'iea',
                        'name' => $ieaName,
                        'order' => $i,
                        'module_reminder_tag_id' =>
                          ModuleReminderTag::where('name', 'like', '%' .$ieaName. '%')->pluck('id')[0],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],

                    [
                        'course_key' => 'iaa',
                        'name' => $iaaName,
                        'order' => $i,
                        'module_reminder_tag_id' =>
                            ModuleReminderTag::where('name', 'like', '%' .$iaaName. '%')->pluck('id')[0],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
                ]);
            }
        }

    }
}
