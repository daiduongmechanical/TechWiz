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
<<<<<<< HEAD
        'category_id',
=======
        'type',
>>>>>>> origin/hien1
        'provider_id',
        'warehouse_id'

    ];
<<<<<<< HEAD

    protected $primaryKey = 'product_id';

=======
    protected $primaryKey = 'product_id';
>>>>>>> origin/hien1
    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'product_id');
    }

    public function quantity(): HasOne
    {
<<<<<<< HEAD
        return $this->hasOne(Warehouse::class, 'product_id');
=======
        return $this->hasOne(Warehouse::class, 'warehouse_id');
>>>>>>> origin/hien1
    }

    public function provider(): BelongsTo
    {
<<<<<<< HEAD
        return $this->belongsTo(Provider::class, 'product_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
=======
        return $this->belongsTo(Provider::class, 'provider_id');
    }

    public function cartItem()
    {
        return $this->hasMany(CartItem::class,'product_id','product_id');
    }

   
   public function review()
    {
        return $this->hasMany(Review::class,'product_id','product_id');
    }

    public function avgrating()
    {
        $totalrating = 0;
        $i = 0;
        foreach ($this->review as $revieww) {
            $totalrating += $revieww->rating;
        }

        $reviewCount = $this->review->count();

        $averageRating = ($reviewCount > 0) ? $totalrating / $reviewCount : 0;

        $averageRating = round($averageRating * 2) / 2; 

        return $averageRating;
>>>>>>> origin/hien1
    }
}
