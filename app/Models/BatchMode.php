<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchMode extends Model
{
    use HasFactory;
    protected $table = 'batch_mode';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    protected $guarded = [];
    
}
