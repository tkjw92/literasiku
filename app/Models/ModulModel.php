<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulModel extends Model
{
    use HasFactory;
    protected $table = 'tb_modul';
    protected $guarded = [];
    public $timestamps = false;
}
