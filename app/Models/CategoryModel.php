<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryModel extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'tb_category';
    protected $fillable = ['name_category'];

    /**
     *
     *
     */
    public function inventaris(): HasMany
    {
        return $this->hasMany(InventarisModel::class, 'id_category', 'id');
    }
}


