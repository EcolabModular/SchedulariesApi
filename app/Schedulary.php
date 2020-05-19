<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedulary extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dateStart', 'dateEnd','status','report_id','item_id'
    ];
}
