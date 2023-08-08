<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryModel extends Model
{
    use HasFactory;
    protected $table='gallery';
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
