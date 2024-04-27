<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class FabricType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'cost', 'description', 'type', 'size'];

    protected $casts = [
        'size' => 'array',
    ];
    public function fabric(): HasMany
    {
        return $this->hasMany(Fabric::class);
    }
}
