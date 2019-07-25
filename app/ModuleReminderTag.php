<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuleReminderTag extends Model
{
    const MODULE_REMINDERS_COMPLETED = 154;

    public function module()
    {
        return $this->hasMany('App\Module');
    }
}
