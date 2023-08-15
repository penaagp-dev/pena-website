<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable = [
        'id',
        'uuid',
        'title',
        'deskripsi',
        'gambar',
        'link',
        'tgl_update',
        'created_at',
        'update_at',
    ];
}
