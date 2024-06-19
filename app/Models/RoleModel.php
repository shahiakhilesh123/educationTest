<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class RoleModel extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    protected $guarded = [];
}
