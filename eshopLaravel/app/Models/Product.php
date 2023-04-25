<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'brand_id',
        'color_id',
        'size_id',
        'sex_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_product');
    }
}
