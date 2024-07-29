<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterCaModel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'tb_registerca';
    protected $fillable = [
        'id',
        'name',
        'date_of_birth',
        'religion',
        'email',
        'phone',
        'major',
        'semester',
        'gender',
        'address',
        'reason_register',
        'status',
        'photo'
    ];
}
