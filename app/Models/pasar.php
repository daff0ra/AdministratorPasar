<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasar extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama','id_wilayah'];
    protected $table = 'pasar';
    public $timestamps = false;
}
