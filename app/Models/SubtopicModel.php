<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubtopicModel extends Model
{
    use HasFactory;
    protected $table = 'tb_subtopic';
    protected $guarded = [];
    public $timestamps = false;
}
