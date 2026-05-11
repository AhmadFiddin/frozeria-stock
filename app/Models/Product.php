<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'unit',
        'stock',
        'minimum_stock',
        'selling_price',
        'purchase_price',
        'weight',
        'storage_location',
        'description',
        'photo',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
