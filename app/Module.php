<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function moduleReminderTag()
    {
        return $this->belongsTo('App\ModuleReminderTag');
    }

    public function user()
    {
        return $this->belongsToMany('App\User', 'user_progress');
    }
}
