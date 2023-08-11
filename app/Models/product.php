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
        'category_id',
        'provider_id',
        'warehouse_id'

    ];

    protected $primaryKey = 'product_id';

    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'product_id');
    }

    public function quantity(): HasOne
    {
        return $this->hasOne(Warehouse::class, 'product_id');
    }

    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class, 'product_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
