<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $table = 'course';
protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $guarded = [];
}
