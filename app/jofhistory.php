<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jofhistory extends Model
{
    protected $fillable = [
        'joforderid','jofno','kind_of_ring','event_time','jof_status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'jof_history';
}
