<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmitModel extends Model
{
    use HasFactory;
    protected $table = 'tb_submit';
    protected $guarded = [];
    public $timestamps = false;
}
