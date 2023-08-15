<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleryModel extends Model
{
    use HasFactory;
    protected $table='galery';
    protected $fillable = [
        'id',
        'uuid',
        'nama',
        'jabatan',
        'gambar',
        'created_at',
        'updated_at',
    ];
}
