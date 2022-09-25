<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'page_table';
    protected $guarded = [];
    protected $hidden  = ['created_at', 'updated_at'];
}
