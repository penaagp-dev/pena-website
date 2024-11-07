<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarisModel extends Model
{
    use HasFactory,HasUuids;

    protected $table = 'tb_inventaris';
    protected $fillable = [
        'id',
        'name_inventaris',
        'stock',
        'location_item',
        'id_category',
        'status',
        'is_condition',
        'description',
        'img_inventaris'
    ];
}
