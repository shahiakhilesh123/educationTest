<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentAnswer extends Model
{
    use HasFactory;
    protected $table = 'student_answer';
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $guarded = [];
}
