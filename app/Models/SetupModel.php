<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetupModel extends Model
{
    use HasFactory;
    protected $table='tbl_setup';
    protected $fillable = [
        'id',
        'uuid',
        'title',
        'deskripsi',
        'gambar'
    ];
}
