<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'description',
        'price',
        'type',
        'provider_id',
        'warehouse_id'

    ];

    protected $primaryKey = 'product_id';

    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'image_id');
    }

    public function quantity(): HasOne
    {
        return $this->hasOne(Warehouse::class, 'warehouse_id');
    }

    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }
}
