<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    use HasFactory;
    protected $table = 'syllabus';
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $guarded = [];
}
