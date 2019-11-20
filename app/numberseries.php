<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class numberseries extends Model
{
    protected $fillable = [
        'series_code','year','seriesno','incrementno'
    ];
    protected $primaryKey = 'id';
    protected $table = 'numberseries';
}
