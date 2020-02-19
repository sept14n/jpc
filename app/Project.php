<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'contract_date'
    ];

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
