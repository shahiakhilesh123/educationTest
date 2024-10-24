<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentTestAttenmp extends Model
{
    use HasFactory;
    protected $table = 'student_test_attenmp';
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $guarded = [];
}
