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

    public function scopeFilter($query, $columns, $searchTerm, $filters) {
        if($searchTerm) {
            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', '%' . $searchTerm . '%');
            }
        
            return $query;
        }

        if ($filters['price_from'] && $filters['price_to']) {
            $query->whereBetween('price', [$filters['price_from'], $filters['price_to']]);
        } else if ($filters['price_from']) {
            $query->where('price', '>=', $filters['price_from']);
        } else if ($filters['price_to']) {
            $query->where('price', '<=', $filters['price_to']);
        }
    
        if ($filters['color']) {
            $query->where('color_id', $filters['color']);
        }
    
        if ($filters['brand']) {
            $query->where('brand_id', $filters['brand']);
        }
    
        return $query;

    }

}
