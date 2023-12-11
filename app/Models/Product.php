<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'cost', 'image', 'category', 'quantity', 'discription', 'cat_slug', 'size'];

    protected $casts = [
        'size' => 'array',
    ];
}
