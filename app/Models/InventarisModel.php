<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventarisModel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'tb_inventaris';
    protected $fillable = [
        'name_inventaris',
        'stock',
        'location_item',
        'id_category',
        'status',
        'is_condition',
        'description',
        'img_inventaris',
    ];

    /**
     * Relasi ke tabel kategori.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryModel::class, 'id_category', 'id');
    }

    /**
     * Accessor: Konversi nilai boolean menjadi "Baik" atau "Rusak".
     */
    public function getIsConditionAttribute($value)
    {
        return $value ? 'Baik' : 'Rusak';
    }

    /**
     * Mutator: Konversi nilai "Baik" atau "Rusak" menjadi boolean.
     */
    public function setIsConditionAttribute($value)
    {
        $this->attributes['is_condition'] = ($value === 'Baik') ? 1 : 0;
    }
}
