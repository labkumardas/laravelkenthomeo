<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'subcategory_id',
        'short_description',
        'long_description',
        'diseases_curable',
        'mrp',
        'price',
        'discount',
        'hsn_code',
        'gst_rate',
        'created_by',
        'status',
        'stock',
        'packing_size'

    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }
}
