<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BorrowModel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'tb_borrow';
    protected $fillable = [
        'id',
        'name_borrow',
        'id_inventaris',
        'quantity',
        'description',
    ];

    public function inventaris(): belongsTo
    {
        return $this->belongsTo(InventarisModel::class, 'id_inventaris');
    }
}
