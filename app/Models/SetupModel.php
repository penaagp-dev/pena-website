<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetupModel extends Model
{
    use HasFactory;
    protected $table='tb_setup';
    protected $fillable = [
        'id',
        'uuid',
        'title',
        'deskripsi',
        'gambar',
        'created_at',
        'updated_at',
    ];
}
