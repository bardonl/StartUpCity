<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'requested_user_id',
        'received_user_id'
    ];
}
