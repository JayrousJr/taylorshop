<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fabric extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['image', 'status', 'type_id'];
    public function type(): BelongsTo
    {
        return $this->belongsTo(FabricType::class, 'type_id');
    }
    protected $casts = [
        'image' => 'array',
        'status' => 'boolean',
    ];
}