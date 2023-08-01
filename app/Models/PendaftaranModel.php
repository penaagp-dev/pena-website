<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranModel extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran';
    protected $fillable = [
        'id' ,'uuid' , 'nama' , 'tanggal_lahir' , 'agama' , 'email' , 'jurusan' , 'angkatan' , 'no_hp' , 'alamat' , 'alasan_masuk' , 'gambar' , 'created_at' , 'updated_at'
    ];
}
