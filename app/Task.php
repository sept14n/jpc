<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'project_tasks';

    protected $fillable = [
        'name', 'project_id', 'plan_start_date', 'plan_end_date'
    ];
}
