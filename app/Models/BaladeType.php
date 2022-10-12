<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaladeType extends Model
{
    use HasFactory;

    public function balades() {
        return $this->hasMany(Balade::class);
    }
}
