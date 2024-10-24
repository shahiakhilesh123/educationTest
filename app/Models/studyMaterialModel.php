<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studyMaterialModel extends Model
{
    use HasFactory;
    protected $table = 'study_material';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];
}
