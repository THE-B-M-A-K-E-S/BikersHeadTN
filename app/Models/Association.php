<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Association extends Model
{
    use Sortable;
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'number',
        'pres_name',
        'description',
        'association_types_id',
    ];
    public $sortable = [
        'name',
        'address',
        'number',
        'pres_name',
        'description',
        'association_types_id',
    ];

    public function associationType() {
        return $this->belongsTo(AssociationType::class, "association_types_id");
    }
}
