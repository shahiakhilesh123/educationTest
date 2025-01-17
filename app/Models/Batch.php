<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $table = 'batch';
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $guarded = [];
}
