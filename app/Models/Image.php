<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_id',
        'url',
        'product_id',



    ];

    public function provider(): BelongsTo
    {
        return $this->belongsTo(product::class, 'product_id');
    }
}