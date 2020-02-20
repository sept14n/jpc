<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'division';

    protected $fillable = [
        'name'
    ];
}
