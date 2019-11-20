<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joforder extends Model
{
    protected $fillable = [
        'refno','orderno','kind_of_order','fb_sales_name','jofno','distributor_name','distributor_code','customer_name','trackingno','date_prepared','due_date','jof_status','active_date','created_by',
        'kind_of_ring','metal','ring_size','year','karat','text_style','stone','weight','oxidation','inside_engrave',
        'left_shank','top_shank','right_shank','attach_remarks','upload_image','remarks','sp_order','sp_approve'
    ];
    protected $primaryKey = 'id';
    protected $table = 'joforder';
}
