<?php

namespace App\Http\Helpers;


use App\Module;
use App\ModuleReminderTag;
use App\User;
use DB;

class ModuleReminderTagHelper
{
    public function __construct(InfusionsoftHelper $infusionsoftHelper)
    {
        $this->infusionsoftHelper = $infusionsoftHelper;
    }

    public function getNextTagId($contactEmail, $boughtCourses)
    {
        $coursesKeys = explode(',', strtolower($boughtCourses));
        $maxCompletedModules = DB::table('users')
            ->join('user_progress', 'user_progress.user_id', '=', 'users.id')
            ->join('modules', 'user_progress.module_id', '=', 'modules.id')
            ->where('email', $contactEmail)
            ->whereIn('modules.course_key', $coursesKeys)
            ->whereNotNull('user_progress.ended_at')
            ->groupBy('modules.course_key')
            ->pluck(DB::raw('max(modules.order) as lastCompletedModule'), 'modules.course_key')
        ;

        $maxModulesPerCourse = DB::table('modules')
            ->whereIn('modules.course_key', $coursesKeys)
            ->groupBy('course_key')
            ->pluck(DB::raw('max(modules.order) as maxModule'), 'modules.course_key');

        foreach($coursesKeys as $courseKey) {
            $lastCompletedModule = $maxCompletedModules->get($courseKey) ?? -1;
            if($lastCompletedModule < $maxModulesPerCourse->get($courseKey)) {
                $nextModule = Module::where('course_key', $courseKey)
                    ->where('order', '>', $lastCompletedModule)
                    ->orderBy('order')->first();
                return $nextModule->module_reminder_tag_id;
            }
        }
        return ModuleReminderTag::MODULE_REMINDERS_COMPLETED;
    }
}