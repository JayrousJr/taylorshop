<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClothType extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'cost', 'description', 'type', 'size'];
    public function cloth(): HasMany
    {
        return $this->hasMany(Cloth::class);
    }
    protected $casts = [
        'size' => 'array',
    ];
}
