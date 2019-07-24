<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuleReminderTag extends Model
{
    public function module()
    {
        return $this->hasMany('App\Module');
    }
}
