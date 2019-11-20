<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributors extends Model
{
    protected $fillable = [
        'distributor_code','distributor_name','created_by',
    ];
    protected $primaryKey = 'id';
    protected $table = 'distributors';
}