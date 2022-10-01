<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    
    protected $table = '';
    protected $guarded = [];
    protected $hidden  = ['created_by', 'created_at', 'updated_at'];

}
