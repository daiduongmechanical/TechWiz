<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id',
        'name',
        'country',
        'logo'

    ];

<<<<<<< HEAD
    protected $primaryKey = 'provider_id';
=======
>>>>>>> origin/hien1
    public function products(): HasMany
    {
        return $this->hasMany(product::class, 'product_id');
    }
}
