<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseUserMap extends Model
{
    use HasFactory;
    protected $table = 'course_user_map';
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $guarded = [];
}
