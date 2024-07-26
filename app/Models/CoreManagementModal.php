<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreManagementModal extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'tb_coremanagement';
    protected $fillable = [
        'name', 'jabatan', 'photo'
    ];
}
